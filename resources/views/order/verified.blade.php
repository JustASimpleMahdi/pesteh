@php use App\Enums\OrderStatusEnum; @endphp
    <!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=360, initial-scale=1.0"/>
    <title>وضعیت پرداخت</title>

    <style>
        @font-face {
            font-family: "iranFont";
            src: url("{{ asset('fonts/Iranian Sans.ttf') }}");
        }

        body {
            margin: 0;
            background: #fafafa;
            font-family: "iranFont";
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 360px;
            height: 800px;
            background: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.08);
            position: relative;
            overflow: hidden;
        }

        /* ------------------- هدر نیم‌دایره‌ای ------------------- */

        .header {
            width: 120%;
            height: 120px;
            background: #D0D2A1;
            position: absolute;
            top: 0;
            left: -10%;
            border-bottom-left-radius: 50% 60px;
            border-bottom-right-radius: 50% 60px;
        }

        .header-content {
            position: relative;
            width: 100%;
            text-align: center;
            padding-top: 25px;
        }

        .header-content h2 {
            margin: 0;
            margin-top: 30px;
            margin-bottom: 10px;
            font-size: 20px;
            font-weight: bold;
        }

        /* فلش برگشت */
        .back-btn {
            position: absolute;
            top: 33px;
            left: 20px;
            cursor: pointer;
        }

        .back-btn img {
            width: 22px;
            height: auto;
        }

        /* ------------------- محتوای اصلی ------------------- */
        .main {
            margin-top: 100px;
        }

        .main-content {
            margin-top: 160px;
            text-align: center;
        }

        .main-content img {
            width: 147px;
            height: 146px;
            margin-bottom: 25px;
        }

        /* ------------------- باکس‌های وضعیت ------------------- */

        .status-box {
            width: 175px;
            height: 40px;
            background: #D0D2A1;
            margin: 12px auto;
            border-radius: 25px;
            padding: 8px 15px;
            display: flex;
            align-items: center;
            font-size: 14px;
            justify-content: flex-start;
        }

        .status-box span {
            margin-right: 10px;
            width: 104px;
            height: 20px;
            justify-content: center;
            text-align: center;
        }

        .status-box img {
            width: 24px;
            height: 24px;
            margin-left: 1px;
            margin-right: 10px;
        }

        /* ------------------- دکمه بازگشت ------------------- */

        .return-btn {
            position: absolute;
            bottom: 50px;
            left: 50%;
            transform: translateX(-50%);
            width: 262px;
            height: 49px;
            background: #6D710D;
            color: #D0D2A1;
            border-radius: 25px;
            font-size: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }

        .return-btn img {
            width: 22px;
        }
    </style>
</head>

<body>

<div class="container">

    <!-- هدر نیم دایره -->
    <div class="header"></div>

    <!-- محتویات هدر -->
    <div class="header-content">
        <h2>وضعیت پرداخت</h2>
        <a href="{{ route('home') }}" class="back-btn">
            <img src="{{ asset('/icons & images/Arrow - Left 2.png') }}" alt="بازگشت">
        </a>
    </div>

    <!-- محتوای اصلی -->

    <div class="main">
        @if($order->status === OrderStatusEnum::PAYMENT_SUCCESS)
            <div class="status-box">
                <span>پرداخت موفق</span>
                <img src="{{ asset('/icons & images/Shield Done.png') }}" alt="موفق">
            </div>
            <div class="status-box">
                <span>کد سفارش: {{$order->payment->ref_id}}</span>
            </div>
            <div class="status-box">
                <span>شماره تراکنش: {{$order->payment->ref_id}}</span>
            </div>
            <div class="status-box">
                <span>با تشکر از خرید شما</span>
                <img src="{{ asset('/icons & images/Heart.png') }}" alt="تشکر">
            </div>
        @else
            <div class="status-box">
                <span>پرداخت ناموفق</span>
                <img src="{{ asset('/icons & images/Close Square.png') }}" alt="موفق">
            </div>

            <div class="status-box">
                <span>با تشکر از تلاش شما</span>
                <img src="{{ asset('/icons & images/Heart.png') }}" alt="تشکر">
            </div>
            <div class="status-box">
                <span>لطفا در شرایط مطلوب مجددا تلاش کنید</span>
                <img src="{{ asset('/icons & images/Heart.png') }}" alt="تشکر">
            </div>
        @endif
    </div>
</div>

<!-- دکمه بازگشت -->
<a href="{{ route('home') }}" class="return-btn">
    <span>بازگشت به فروشگاه</span>
    <img src="{{ asset('/icons & images/Arrow - Left 2.png') }}" alt="فلش">
</a>

</body>

</html>
