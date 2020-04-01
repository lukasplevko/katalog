<?php

namespace App\Http\Controllers;

use App\Product;
use App\Oblubene;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Táto metóda sa stará o výpis produktov podľa podmienok, ktoré ťahá z url adresy
        //čiže pokiaľ adresa obsahuje vyber kategorie, kod  prejde do podmienky request()->has('category)
        //a vytiahne z DB dáta na základe podmienok

        $znacky_menu= Product::select('brand_name')
        ->groupBy('brand_name')
        ->get();

        $znacky= Product::select('brand_name')
        ->groupBy('brand_name')
        ->get();

        $max_price = Product::orderBy('base_price', 'desc')
        ->where('merchant_category','like', '%'.request('category').'%')
        ->first();
        $min_price = Product::orderBy('base_price', 'asc')
        ->where('merchant_category','like', '%'.request('category').'%')
        ->first();
      $produkty = new Product;

      if(request()->has('kategoria')){
          $produkty = $produkty->where('merchant_category','like', '%'.request('kategoria').'%');
          $znacky= Product::select('brand_name')
            ->where('merchant_category','like', '%'.request('kategoria').'%')
            ->groupBy('brand_name')
            ->get();
      }

      if(request()->has('triedenie')){
          $produkty = $produkty->orderBy('base_price', request('triedenie'));
      }

      if(request()->has('znacka')){
        $produkty = $produkty->where('brand_name', request('znacka'));
        $max_price = Product::orderBy('base_price', 'desc')
        ->where('merchant_category','like', '%'.request('kategoria').'%')
        ->where('brand_name', request('znacka'))
        ->first();
        $min_price = Product::orderBy('base_price', 'asc')
        ->where('merchant_category','like', '%'.request('kategoria').'%')
        ->where('brand_name', request('znacka'))
        ->first();
     }

     if(request()->has('najlacnejsie') && request()->has('najdrahsie'))
     {

        $produkty = $produkty->whereBetween('base_price', [request('najlacnejsie'),request('najdrahsie')]);
         $znacky= Product::select('brand_name')
         ->where('merchant_category','like', '%'.request('kategoria').'%')
         ->groupBy('brand_name')
         ->get();
     }

     $produkty = $produkty->paginate(10)->appends([
            'kategoria'=>request('kategoria'),
            'triedenie' => request('triedenie'),
            'znacka' => request('znacka'),
            'najlacnejsie' => request('najlacnejsie'),
            'najdrahsie' => request('najdrahsie')

      ]);

         return view('obchod', compact('znacky_menu','znacky','max_price', 'min_price','produkty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function search(Request $request){

        $znacky_menu= Product::select('brand_name')
        ->groupBy('brand_name')
        ->get();

        $znacky= Product::select('brand_name')
        ->groupBy('brand_name')
        ->get();

        $max_price = Product::orderBy('base_price', 'desc')
        ->where('merchant_category','like', '%'.request('category').'%')
        ->first();
        $min_price = Product::orderBy('base_price', 'asc')
        ->where('merchant_category','like', '%'.request('category').'%')
        ->first();

        $produkty = Product::where('brand_name', 'like', '%'.$request->input('search-bar').'%')
        ->orWhere('product_name','like', '%'.$request->input('search-bar').'%')
        ->orWhere('merchant_category','like', '%'.$request->input('search-bar').'%')
        ->paginate(10);

        return view('obchod', compact('znacky_menu','znacky','max_price', 'min_price','produkty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        $znacky_menu= Product::select('brand_name')
        ->groupBy('brand_name')
        ->get();
        $produkt = Product::where('merchant_product_id', $product_id)->first();

        $podobne = Product::where('brand_name','like', '%'.$produkt->brand_name.'%')
        ->orWhere('merchant_category','like', '%'.$produkt->merchant_category.'%')
        ->get();

        if(Oblubene::where('merchant_product_id', $product_id)->first()){
            $oznacene = true;
        }else{
            $oznacene = false;
        }
        return view('produkt', compact('znacky_menu','produkt','podobne','oznacene'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function addToFavorites($product_id)
    {

        $produkt= Product::where('merchant_product_id',$product_id)->first();
        $oblubene = new Oblubene;
        $oblubene->brand_name = $produkt->brand_name;
        $oblubene->product_name =$produkt->product_name;
        $oblubene->user_id = auth()->user()->id;
        $oblubene->size =$produkt->size;
        $oblubene->alternate_image =$produkt->alternate_image;
        $oblubene->merchant_product_id=$produkt->merchant_product_id;
        $oblubene->display_price =$produkt->display_price;
        $oblubene->base_price =$produkt->base_price;
        $oblubene->suitable_for =$produkt->suitable_for;
        $oblubene->colour=$produkt->colour;
        $oblubene->merchant_deep_link= $produkt->merchant_deep_link;
        $oblubene->save();
        $oznacene = true;
        return redirect(url()->previous())->with('message', 'Položka bola pridaná do obľúbených')->with('oznacene', $oznacene);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {

        DB::delete('delete from oblubene where merchant_product_id = ?',[$product_id]);
        $oznacene= false;

        return redirect(url()->previous())->with('message', 'Položka bola odstránená')->with('oznacene', $oznacene);


    }
}
