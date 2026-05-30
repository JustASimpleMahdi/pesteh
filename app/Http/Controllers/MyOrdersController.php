<?php

namespace App\Http\Controllers;

use App\Enums\OrderStatusEnum;

class MyOrdersController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $currentOrders = $user->orders()->with('items', 'items.product', 'receiver', 'payment')
            ->where('status', OrderStatusEnum::PENDING)->latest('updated_at')->get();
        $otherOrders = $user->orders()->with('items', 'items.product', 'receiver', 'payment')
            ->whereNot('status', OrderStatusEnum::PENDING)->latest('updated_at')->get();

        return view('my-order.index', compact('currentOrders', 'otherOrders'));
    }
}
