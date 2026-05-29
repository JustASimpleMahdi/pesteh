<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;
use App\Models\Order;
use App\Models\Payment;
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

    public function verifyPayment(Request $request)
    {
        $authority = $request->input('Authority');
        $status = $request->input('Status');

        $payment = Payment::where('authority', $authority)->firstOrFail();

        PaymentService::verify($payment);

        return redirect()->route('order.verified', ['order' => $payment->order_id]);
    }

    public function verifiedOrder(Order $order)
    {
        if ($order->user()->isNot(auth()->user())) abort(403);

        if (!($order->status === OrderStatusEnum::PAYMENT_SUCCESS || $order->status === OrderStatusEnum::PAYMENT_FAIL))
            abort(403);
        $order->load('payment');

        return view('order.verified', ['order' => $order]);
    }
}
