<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $znacky_menu= Product::select('brand_name')
        ->groupBy('brand_name')
        ->get();
        $produkty = Product::take(6)->get();
        return view('domov', compact('znacky_menu','produkty'));
    }
}
