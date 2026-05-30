@php use App\Enums\OrderStatusEnum;use App\Enums\PaymentStatusEnum; @endphp
@props([
    /** @var \App\Models\Order */
    'order'
])

<div {{ $attributes->class(['order-card']) }}>
    <div class="order-card-header">
        <div class="order-code">سفارش با کد {{ $order->code }}</div>
        <div class="order-summary">مجموع قیمت کل: {{ toman($order->total_price) }}</div>
    </div>

    <div class="order-info">
        <div class="order-row">
            <span class="label">وضعیت سفارش</span>
            <span @class(['value',
'status-success' => $order->status === OrderStatusEnum::PENDING,
'status-fail' => $order->status === OrderStatusEnum::FAILED
])>
                                {{ __("order.status.{$order->status->value}") }}
            </span>
        </div>
        <div class="order-row">
            <span class="label">وضعیت پرداخت</span>
            <span @class(['value',
'status-success' => $order->payment->status === PaymentStatusEnum::SUCCESS,
'status-fail' => $order->payment->status === PaymentStatusEnum::FAIL
])>
                               {{ __("order.payment.status.{$order->payment->status->value}") }}
                        </span>
        </div>
        <div class="order-row">
            <span class="label">هزینه ارسال</span>
            <span class="value">
                            {{ toman($order->shipping_cost) }}
                        </span>
        </div>
        <div class="order-row">
            <span class="label">زمان ایجاد</span>
            <span class="value">{{ fa_digits($order->created_at->toDateTimeString()) }}</span>
        </div>
        <div class="order-row">
            <span class="label">آخرین بروزرسانی</span>
            <span class="value">{{ fa_digits($order->updated_at->toDateTimeString()) }}</span>
        </div>
    </div>

    <div class="order-products">
        @foreach($order->items as $item)

            <div class="product-item">
                <img src="{{ product_image_asset($item->product->code) }}"
                     alt="{{ $item->product->name }}">
                <div class="product-info">
                    <div class="product-name">{{ $item->product->name }}</div>
                    <div class="product-details">وزن: {{ fa_digits(item_amount($item->amount)) }}</div>
                    <div class="product-details">قیمت: {{ toman($item->price) }}</div>
                </div>
            </div>
        @endforeach
    </div>
</div>
