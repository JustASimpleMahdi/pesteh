<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        $cart = auth()->user()->cart;

        return view('cart.index', compact('cart'));
    }
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'productId' => 'required|exists:products,id',
            'amount' => 'required|numeric',
        ]);
        $cart = auth()->user()->cart()->firstOrCreate();
        $cart->items()->updateOrCreate(['product_id' => $validated['productId']], [
            'product_id' => $validated['productId'],
            'amount' => $validated['amount'],
        ]);

        return back()->with('success', 'محصول با موفقیت به سبد خرید اضافه شد.');
    }
}
