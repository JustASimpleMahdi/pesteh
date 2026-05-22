<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function remove(Request $request)
    {
        $validated = $request->validate([
            'productId' => 'required|exists:products,id',
        ]);
        $cart = auth()->user()->cart;
        if ($cart) {
            $item = $cart->items()->whereProductId($validated['productId'])->first();
            $item->delete();
        }

        return back()->with('remove-success', 'محصول با موفقیت حذف شد.');
    }
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

        return back()->with('add-success', 'محصول با موفقیت به سبد خرید اضافه شد.');
    }
}
