<?php

namespace App\Http\Controllers\Manager;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Database\Query\Expression;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $queryBuilder = Order::with(['receiver']);
        if ($request->has('s')) {
            $queryBuilder->whereHas('receiver', function ($q) use ($request) {
                $q->whereRaw(new Expression("CONCAT(firstname, ' ', lastname) LIKE ?"), ["%$request->s%"]);
            });
            $queryBuilder->orWhere('code', 'LIKE', "%$request->s%");
        }
        $orders = $queryBuilder->orderByRaw("CASE WHEN status='" . OrderStatusEnum::PENDING->value . "' THEN 0 ELSE 1 END")
            ->latest()->get();

        return view('manager.orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order->load(['receiver', 'items', 'items.product', 'payment']);
        return view('manager.orders.show', compact('order'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Order $order)
    {
        $order->status = OrderStatusEnum::CONFIRMED;
        $order->save();
        return redirect()->route('manager.orders.show', compact('order'));
    }
}
