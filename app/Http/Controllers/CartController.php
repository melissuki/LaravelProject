<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $cart = session()->get('cart', []);

        $cart[$product->id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1
        ];

        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Product added!');
    }

    public function showCart()
    {
        $cart = session()->get('cart', []);
        return view('front.cart', compact('cart'));
    }

    public function removeItem(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->input('id');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Cart is empty!');
        }

        foreach ($cart as $item) {
            Order::create([
                'user_id' => auth()->id() ?? 1,
                'product_id' => $item['id'],
                'total' => $item['price'],
            ]);
        }

        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Order completed!');
    }
}
