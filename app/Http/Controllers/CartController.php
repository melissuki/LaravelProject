<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productName = $request->input('name');


        $cart = session()->get('cart', []);


        $cart[] = $productName;


        session()->put('cart', $cart);

        return response()->json(['message' => 'Product added to cart!']);
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('front.cart', compact('cart'));
    }

    public function removeItem(Request $request)
    {
        $cart = session()->get('cart', []);
        $index = $request->input('index');

        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', array_values($cart));
        }

        return response()->json(['message' => 'Product removed!']);
    }
}
