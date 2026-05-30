<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function show(string $code)
    {
        $product = Product::whereCode($code)->firstOrFail();
        return view('product.show', compact('product'));
    }
}
