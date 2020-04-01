<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Oblubene;
class PageController extends Controller
{
    public function index(){
        $znacky_menu= Product::select('brand_name')
        ->groupBy('brand_name')
        ->get();

        $user_id = auth()->user()->id;

        $produkty = Oblubene::where('user_id', $user_id)->get();
        $cena = collect($produkty)->sum('base_price');

        return view('oblubene', compact('znacky_menu', 'produkty', 'cena'));
    }
}

