<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.products')->with('success', 'Product created!');
    }
}
