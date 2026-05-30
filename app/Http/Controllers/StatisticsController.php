<?php

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Product;


class StatisticsController extends Controller
{
    public function index()
    {

        $yearlyTotalSales = Order::yearly()->paid()->sum('total_price');
        $monthlyTotalSales = Order::monthly()->paid()->sum('total_price');
        $dailyTotalSales = Order::monthly()->paid()->sum('total_price');

        $products = Product::with(['orders' => function ($query) {
            $query->paid();
        }])->get()->map(function (Product $product) {
            $product->total_sales = $product->orders()
                ->paid()
                ->with('items')
                ->get()
                ->sum(function ($order) use ($product) {
                    return $order->items
                        ->where('product_id', $product->id)
                        ->sum('price');
                });
            return $product;
        });
        return view('manager.statistics.index',
            compact('yearlyTotalSales', 'monthlyTotalSales', 'dailyTotalSales', 'products'));
    }
}
