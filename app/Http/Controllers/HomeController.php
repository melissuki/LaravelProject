<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        if($query) {
            $products = Product::where('name', 'like', '%'. $query . '%')->get();
        }
        else {
            $products = Product::all();
        }

        return view('front.index', compact('products'));
    }
    public function show($id) {
        $product = \App\Models\Product::findOrFail($id);
        return view('front.product-detail', compact('product'));
    }

}

