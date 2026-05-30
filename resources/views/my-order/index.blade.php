<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=360, initial-scale=1.0"/>
    <title>سفارش ها | Pistachio</title>
    <style>
        @font-face {
            font-family: 'iranFont';
            src: url('{{ asset('fonts/Iranian Sans.ttf') }}');
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
            align-items: center;
            min-height: 100vh;
        }

        /* فریم اصلی گوشی - ۳۶۰ در ۸۰۰ */
        .app-frame {
            width: 360px;
            height: 800px;
            background: #fff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* هدر بالا */
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

        /* نوار سبز */
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

        /* باکس اصلی سفارش‌ها */
        .main-panel-box {
            width: 359px;
            height: 506px;
            margin: 15px auto;
            margin-top: 0;
            border: 1px solid #D1D1D1;
            border-radius: 20px;
            padding: 15px 15px 20px;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        /* عنوان بالای باکس */
        .panel-title-text {
            color: #6D710D;
            font-weight: bold;
            font-size: 17px;
            text-align: center;
            margin-bottom: 15px;
        }

        /* خط سبز زیر عنوان */
        .list-row {
            height: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0;
            border-top: 1px solid #6D710D;
        }

        /* تب‌های سفارش‌ها */
        .tabs-wrapper {
            display: flex;
            justify-content: center;
            margin: 10px 0 15px;
            gap: 0;
        }

        .tab-btn {
            width: 50%;
            height: 40px;
            border: 1px solid #6D710D;
            background: #ffffff;
            color: #6D710D;
            font-size: 15px;
            cursor: pointer;
            transition: all .2s ease;
        }

        .tab-btn:first-child {
            border-top-right-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .tab-btn:last-child {
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
        }

        /* حالت فعال */
        .tab-btn.active {
            background: #D9D9D9;
            color: #6D710D;
        }

        /* کانتینر سفارش‌های هر تب */
        .orders-container {
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding-bottom: 10px;
        }

        /* باکس هر سفارش */
        .order-card {
            display: flex;
            flex-direction: column;
            gap: 10px;
            border: 1px solid #CFCFCF;
            border-radius: 16px;
            padding: 12px;
            background: #fff;
        }

        /* هدر کارت */
        .order-card-header {
            display: flex;
            flex-direction: column;
            gap: 6px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
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

        /* بخش متن‌ها */
        .order-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 3px;
            font-size: 12px;
            color: #6D710D;
        }

        /* هر ردیف متن (دو ستون) */
        .order-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            font-size: 12px;
        }

        .order-row span.label {
            font-weight: normal;
            color: #777;
        }

        .order-row span.value {
            font-weight: bold;
            color: #333;
        }

        /* وضعیت‌ها */
        .status-success {
            color: #2e7d32 !important;
        }

        .status-fail {
            color: #c62828 !important;
        }

        /* عنوان اصلی داخل کارت */
        .order-title {
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 4px;
            color: #333;
        }

        /* لیست محصولات داخل سفارش */
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

        /* فوتر */
        .footer-container {
            width: 100%;
            height: 160px;
            position: absolute;
            bottom: 0;
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
        }

        .contact-item {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            gap: 8px;
            font-size: 13px;
            color: #333;
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

<div class="app-frame">

    <!-- هدر -->
    <header class="header-top">
        <a href="{{ route('home') }}" class="logo-right">
            <img src="{{ asset('icons & images/logo2.png') }}" alt="Logo">
        </a>
        <div class="icons-left">
            <a href="{{ route('profile') }}">
                <img src="{{ asset('icons & images/Profile.png') }}" alt="Profile">
            </a>
            <a href="{{ route('cart') }}">
                <img src="{{ asset('icons & images/Bag 2.png') }}" alt="Cart">
            </a>
        </div>
    </header>

    <!-- نوار سبز -->
    <div class="sub-header-green">
        <div class="back-btn" onclick="history.back()">
            <img src="{{ asset('icons & images/Arrow - Left 2.png') }}" alt="Back">
        </div>
        سفارش ها
    </div>

    <!-- محتوای اصلی سفارش‌ها -->
    <div class="main-panel-box">

        <div class="panel-title-text">سفارش های من</div>
        <div class="list-row"></div>

        <!-- تب‌ها -->
        <div class="tabs-wrapper">
            <button id="tabCurrent" class="tab-btn active" onclick="activateTab('current')">جاری</button>
            <button id="tabDelivered" class="tab-btn" onclick="activateTab('delivered')">سفارش های دیگر</button>
        </div>

        <!-- سفارش‌های تب جاری -->
        <div id="ordersCurrent" class="orders-container">
            @foreach($currentOrders as $order)
                <x-my-orders.order-card :order="$order"/>
            @endforeach
        </div>

        <!-- سفارش‌های تب سفارش‌های دیگر -->
        <div id="ordersDelivered" class="orders-container" style="display:none;">

            @foreach($otherOrders as $order)
                <x-my-orders.order-card :order="$order"/>
            @endforeach

        </div>

    </div>

    <!-- فوتر -->
    <footer class="footer-container">
        <div class="footer-right-contact">
            <div class="contact-item">
                <img src="{{ asset('icons & images/Message.png') }}" alt="Email">
                <span>peste.sh@gmail.com :ایمیل</span>
            </div>
            <div class="contact-item">
                <img src="{{ asset('icons & images/Location.png') }}" alt="Loc">
                <span>آدرس: کیلومتر ۳۰ بجنورد</span>
            </div>
            <div class="contact-item">
                <img src="{{ asset('icons & images/Call.png') }}" alt="Phone">
                <span>تلفن: ۰۵۸۳۳۲۴۱۵۶</span>
            </div>
        </div>

        <div class="footer-left-socials">
            <img src="{{ asset('icons & images/Instagram.png') }}"
                 onclick="window.location.href='https://instagr.am/peste'"
                 alt="IG">
            <img src="{{ asset('icons & images/Telegram.png') }}" onclick="window.location.href='https://t.me/peste'"
                 alt="TG">
            <img src="{{ asset('icons & images/Enamad.png') }}" alt="Enamad">
            <img src="{{ asset('icons & images/Youtube.png') }}" alt="YT">
        </div>
    </footer>

</div>

<script>
    function activateTab(tab) {
        const tabCurrent = document.getElementById('tabCurrent');
        const tabDelivered = document.getElementById('tabDelivered');
        const ordersCurrent = document.getElementById('ordersCurrent');
        const ordersDelivered = document.getElementById('ordersDelivered');

        if (tab === 'current') {
            tabCurrent.classList.add('active');
            tabDelivered.classList.remove('active');
            ordersCurrent.style.display = 'flex';
            ordersDelivered.style.display = 'none';
        } else {
            tabDelivered.classList.add('active');
            tabCurrent.classList.remove('active');
            ordersDelivered.style.display = 'flex';
            ordersCurrent.style.display = 'none';
        }
    }
</script>

</body>

</html>
