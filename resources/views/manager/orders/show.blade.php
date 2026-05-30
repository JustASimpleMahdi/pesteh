@php use App\Enums\OrderStatusEnum;use App\Enums\PaymentStatusEnum; @endphp
    <!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=360, initial-scale=1.0"/>
    <title>جزئیات فروش | Pistachio</title>
    <style>
        @font-face {
            font-family: 'iranFont';
            src: url('/fonts/Iranian\ Sans.ttf');
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
            font-family: 'iranFont', Tahoma, sans-serif;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        /* فریم اصلی گوشی */
        .app-frame {
            width: 360px;
            background-color: #ffffff;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* ======= هدر ======= */
        .header-top {
            height: 74px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 15px;
            background: #fff;
        }

        .header-top .logo-right img {
            height: 55px;
            cursor: pointer;
        }

        .header-top .icons-left {
            display: flex;
            gap: 15px;
        }

        .header-top .icons-left img {
            width: 26px;
            cursor: pointer;
        }

        /* ======= نوار سبز ======= */
        .sub-header-green {
            width: 100%;
            height: 60px;
            background-color: #6D710D;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: #d0d2a1;
            font-size: 19px;
            font-weight: bold;
        }

        .sub-header-green .back-btn {
            position: absolute;
            left: 15px;
            cursor: pointer;
        }

        .sub-header-green .back-btn img {
            width: 20px;
        }

        /* ======= محتوا ======= */
        .main-content {
            width: 359px;
            margin: 0 auto 0 auto;
            border: 1px solid #D1D1D1;
            border-radius: 20px;
            padding: 12px 15px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* خطوط سبز بین بخش‌ها */
        .separator {
            width: 100%;
            height: 1px;
            background-color: #6D710D;
        }

        /* بخش اطلاعات */
        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .info-row label {
            color: #6D710D;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .info-box {
            background: #EAEAEA;
            border-radius: 10px;
            width: 180px;
            height: 39px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #333;
        }

        /* باکس وضعیت */
        .status-box {
            background: #EAEAEA;
            border-radius: 10px;
            width: 180px;
            min-height: 39px;
            padding: 4px 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 13px;
            color: #333;
        }

        .status-text {
            color: #333;
            font-size: 13px;
            white-space: nowrap;
        }

        .status-submit-btn {
            border: none;
            background-color: #6D710D;
            color: #D0D2A1;
            border-radius: 8px;
            padding: 6px 12px;
            font-family: "iranFont";
            font-size: 12px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .status-submit-btn:hover {
            opacity: .95;
        }

        /* آدرس */
        .address-section label {
            color: #6D710D;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .address-box {
            background: #EAEAEA;
            border-radius: 10px;
            height: 70px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            padding: 10px;
            font-size: 13px;
            color: #333;
        }

        /* جزئیات سفارش */
        .order-title {
            color: #6D710D;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* کارت جدید سفارش */
        .order-card {
            display: flex;
            flex-direction: column;
            gap: 10px;
            border: 1px solid #D1D1D1;
            border-radius: 16px;
            padding: 12px;
            background: #fff;
        }

        .order-card-header {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding-bottom: 10px;
            border-bottom: 1px solid #EAEAEA;
        }

        .order-code {
            font-size: 13px;
            font-weight: bold;
            color: #6D710D;
        }

        .order-summary {
            font-size: 12px;
            color: #444;
        }

        .order-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
            font-size: 12px;
        }

        .order-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .order-row .label {
            color: #777;
        }

        .order-row .value {
            color: #333;
            font-weight: bold;
        }

        .status-success {
            color: #2E7D32 !important;
        }

        .status-waiting {
            color: #C07A00 !important;
        }

        .order-products {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 4px;
        }

        .product-item {
            display: flex;
            flex-direction: row-reverse;
            gap: 10px;
            border: 1px solid #F0F0F0;
            border-radius: 14px;
            padding: 8px;
            background: #FAFAFA;
        }

        .product-item img {
            width: 62px;
            height: 62px;
            object-fit: cover;
            border-radius: 10px;
            flex-shrink: 0;
        }

        .product-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .product-name {
            font-size: 13px;
            font-weight: bold;
            color: #333;
        }

        .product-details {
            font-size: 12px;
            color: #666;
        }

        /* ======= فوتر ======= */
        .footer-container {
            width: 100%;
            height: 160px;
            border-top: 1px solid #E0E0E0;
            display: flex;
            padding: 15px;
            justify-content: space-between;
        }

        .footer-right-contact {
            display: flex;
            flex-direction: column;
            gap: 10px;
            text-align: right;
            font-size: 13px;
            color: #333;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .contact-item img {
            width: 20px;
        }

        .footer-left-socials {
            display: flex;
            flex-direction: column;
            gap: 10px;
            align-items: flex-start;
        }

        .footer-left-socials img {
            width: 28px;
            cursor: pointer;
        }

    </style>
</head>
<body>

<div class="app-frame" id="appFrame">

    <!-- هدر -->
    <header class="header-top">
        <a href="{{ route('home') }}" class="logo-right">
            <img
                src="{{ asset('/icons & images/logo2.png') }}"
                onclick="window.location.href = 'index.html'"
                alt="Logo"
            />
        </a>

        <div class="icons-left">
            <a href="{{ route('profile') }}">
                <img
                    src="{{ asset('/icons & images/Profile.png') }}"
                    alt="Profile"
                />
            </a>
            <a href="{{ route('cart') }}">
                <img
                    src="{{ asset('/icons & images/Bag 2.png') }}"
                    alt="Cart"
                />
            </a>
        </div>
    </header>


    <!-- نوار سبز -->
    <div class="sub-header-green">
        <a href="{{ route('manager.orders.index') }}" class="back-btn">
            <img src="/icons & images/Arrow - Left 2.png" alt="Back">
        </a>
        لیست جزئیات
    </div>

    <!-- بخش اصلی -->
    <div class="main-content">
        <h3 style="color:#6D710D;font-size:17px;margin:0 0 10px;">جزئیات فروش</h3>
        <div class="separator"></div>

        <!-- وضعیت -->
        <div class="info-row">
            <label><img src="/icons & images/Profile.png" width="18" alt="">وضعیت</label>
            @if($order->status === OrderStatusEnum::PENDING)
                <form action="{{ route('manager.orders.update',['order' => $order]) }}" method="post"
                      class="status-box">
                    @csrf
                    @method('PUT')
                    <span class="status-text"
                          id="statusText">{{ __('order.manager.status.'.$order->status->value) }}</span>
                    <button class="status-submit-btn" id="statusSubmitBtn">ثبت</button>
                </form>
            @else
                <div class="status-box">
                    <span class="status-text"
                          id="statusText">{{ __('order.manager.status.'.$order->status->value) }}</span>
                </div>
            @endif
        </div>

        <div class="separator"></div>

        <!-- نام مشتری -->
        <div class="info-row">
            <label><img src="/icons & images/Profile.png" width="18" alt="">نام گیرنده</label>
            <div class="info-box">{{ $order->receiver->fullname }}</div>
        </div>

        <div class="separator"></div>

        <!-- شماره تماس -->
        <div class="info-row">
            <label><img src="/icons & images/Call.png" width="18" alt="">شماره تماس</label>
            <div class="info-box">{{ $order->receiver->phone }}</div>
        </div>

        <div class="separator"></div>

        <!-- آدرس -->
        <div class="address-section">
            <label><img src="/icons & images/Location.png" width="18" alt="">آدرس</label>
            <div class="address-box">{{ $order->receiver->full_address }}</div>
        </div>

        <div class="separator"></div>

        <!-- جزئیات سفارش -->
        <div class="order-title">
            <img src="/icons & images/Document.png" width="18" alt="">
            جزئیات سفارش
        </div>

        <div class="order-card">
            <div class="order-card-header">
                <div class="order-code">سفارش با کد سفارش {{$order->code}}</div>
                <div class="order-summary">مجموع قیمت کل سفارش: {{ toman($order->total_price) }}</div>
            </div>

            <div class="order-info">
                <div class="order-row">
                    <span class="label">هزینه ارسال</span>
                    <span class="value">
                               {{ toman($order->shipping_cost) }}
                    </span>
                </div>
                <div class="order-row">
                    <span class="label">وضعیت پرداخت</span>
                    <span @class([
                                    'value',
                                    'status-success' => $order->payment->status === PaymentStatusEnum::SUCCESS,
                                    'status-fail' => $order->payment->status === PaymentStatusEnum::FAIL
                                 ])>
                               {{ __("order.payment.status.{$order->payment->status->value}") }}
                        </span>
                </div>
                <div class="order-row">
                    <span class="label">تاریخ و زمان</span>
                    <span class="value">{{ fa_digits($order->created_at->format('H:i - Y/m/d')) }}</span>
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
    </div>

    <!-- فوتر -->
    <footer class="footer-container">
        <div class="footer-right-contact">
            <div class="contact-item"><img src="/icons & images/Message.png"><span>peste.sh@gmail.com :ایمیل</span>
            </div>
            <div class="contact-item"><img src="/icons & images/Location.png"><span>آدرس: کیلومتر ۲۰ بجنورد</span></div>
            <div class="contact-item"><img src="/icons & images/Call.png"><span>تلفن: ۰۵۸۳۳۲۴۱۵۶</span></div>
        </div>
        <div class="footer-left-socials">
            <img src="/icons & images/Instagram.png"><img src="/icons & images/Telegram.png"><img
                src="/icons & images/Enamad.png"><img src="/icons & images/Youtube.png">
        </div>
    </footer>

</div>

</body>
</html>
