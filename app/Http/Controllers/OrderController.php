<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        if (auth()->user()->cart()->has('items')->doesntExist()) abort(403);

        return view('order.index', ['user' => auth()->user()->load('address')]);
    }

    public function store(Request $request)
    {
        if (auth()->user()->cart()->has('items')->doesntExist()) abort(403);

        $validated = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'phone' => 'required|regex:/^09\d{9}$/',
            'province' => 'required',
            'city' => 'required',
            'address' => 'required',
        ]);

        ["url" => $url, "order" => $order] = DB::transaction(function () use ($validated) {
            $user = auth()->user()->load('cart', 'cart.items', 'cart.items.product:id,price');
            $cart = $user->cart;

            $order = $user->orders()->create();

            $order->receiver()->create($validated);

            $orderItems = $order->items()->createMany(
                $cart->items->map(fn($item) => [
                    'amount' => $item->amount,
                    'product_price' => $item->product->price,
                    'product_id' => $item->product->id,
                ])->toArray()
            );


            $url = PaymentService::requestPayment(
                order: $order,
                callbackUrl: route('payment.verify'),
            );

            $cart->delete();

            return compact('order', 'url');
        });

        return redirect()->away($url);
    }
}
