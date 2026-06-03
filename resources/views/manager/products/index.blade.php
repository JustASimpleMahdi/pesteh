<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=360, initial-scale=1.0"/>
    <title>لیست محصولات| Pistachio</title>
    <style>
        @font-face {
            font-family: 'iranFont';
            src: url("{{ asset('fonts/Iranian Sans.ttf') }}");
        }

        * {
            box-sizing: border-box;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* پس‌زمینه برای حالت دسکتاپ */
            font-family: 'iranFont', Tahoma, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* فریم اصلی گوشی - ۳۶۰ در ۸۰۰ وسط‌چین */
        .app-frame {
            width: 360px;
            height: 800px;
            background-color: #ffffff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* هدر بالایی */
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
            margin-left: 0px;
        }

        .header-top .icons-left {
            display: flex;
            gap: 15px;

        }

        .header-top .icons-left img {
            width: 26px;
            cursor: pointer;
            margin-right: 0px;
        }

        /* نوار سبز مدیریت */
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

        /* باکس اصلی محتوا */
        .main-panel-box {
            width: 359px;
            height: 506px;
            margin: 15px auto;
            margin-top: 0px;
            border: 1px solid #D1D1D1;
            border-radius: 20px;
            padding: 15px 0;
            display: flex;
            flex-direction: column;
        }

        .panel-title-text {
            color: #6D710D;
            font-weight: bold;
            font-size: 17px;
            padding-right: 20px;
            margin-bottom: 10px;
        }

        /* ردیف‌های لیست */
        .list-row {
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 15px;
            border-top: 1px solid #6D710D;
        }

        .row-right {
            display: flex;
            align-items: center;
            gap: 1px;
        }

        .row-right img {
            width: 22px; /* آیکون‌های سند و آمار */
        }

        .row-right span {
            font-size: 15px;
            color: #000;
        }

        .row-left img {
            width: 18px;
            cursor: pointer;
        }

        /* فوتر نهایی */
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


    <!-- نوار سبز مدیریت -->
    <div class="sub-header-green">
        <a href="{{ route('manager') }}" class="back-btn">
            <img src="{{ asset('icons & images/Arrow - Left 2.png') }}" alt="Back">
        </a>
        محصولات
    </div>

    <!-- باکس لیست مدیریت -->
    <div class="main-panel-box">
        <div class="panel-title-text"> مدیریت محصولات</div>

        @foreach($products as $product)
            <a href="{{ route('manager.products.edit',['product' => $product]) }}" class="list-row">
                <div class="row-right">
                    <img src="{{ asset('icons & images/pestashio.png') }}" alt="Icon">
                    <span>{{ $product->name }}</span>
                </div>
                <div class="row-left">
                    <img src="{{ asset('icons & images/Arrow - Left 2.png') }}" alt="Go">
                </div>
            </a>
        @endforeach

        <!-- لیست فروش -->
        <div class="list-row"></div>
    </div>

    <!-- فوتر -->
    <footer class="footer-container">


        <!-- اطلاعات تماس سمت راست -->
        <div class="footer-right-contact">
            <div class="contact-item">
                <img src="{{ asset('icons & images/Message.png') }}" alt="Email">
                <span>peste.sh@gmail.com :ایمیل</span>
            </div>
            <div class="contact-item">
                <img src="{{ asset('icons & images/Location.png') }}" alt="Loc">
                <span>آدرس: کیلومتر ۲۰ بجنورد</span>
            </div>
            <div class="contact-item">
                <img src="{{ asset('icons & images/Call.png') }}" alt="Phone">
                <span>تلفن: ۰۵۸۳۳۲۴۱۵۶</span>
            </div>
        </div>
        <!-- آیکون‌های مجازی سمت چپ -->
        <div class="footer-left-socials">
            <img src="{{ asset('icons & images/Instagram.png') }}"
                 onclick="window.location.href='https://instagr.am/peste'" alt="IG">
            <img src="{{ asset('icons & images/Telegram.png') }}" onclick="window.location.href='https://t.me/peste'"
                 alt="TG">
            <img src="{{ asset('icons & images/Enamad.png') }}" onclick="window.location.href='#'" alt="Enamad">
            <img src="{{ asset('icons & images/Youtube.png') }}" onclick="window.location.href='#'" alt="YT">
        </div>

    </footer>
</div>

</body>
</html>
