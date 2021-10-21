<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() {

        $products = Product::inRandomOrder()->take(4)->get();

        // dd($products);

        return view('front.index', compact('products'));
    }
}
