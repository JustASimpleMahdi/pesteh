<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=360, initial-scale=1.0"/>
    <title>پنل محصول | Pistachio</title>
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
            font-family: 'iranFont';
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
            background-color: #6d710d;
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
            border: 1px solid #d1d1d1;
            border-radius: 20px;
            padding: 15px 0;
            display: flex;
            flex-direction: column;
        }

        .input-box {
            width: 180px;
            height: 39px;
            background: #eaeaea;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 8px;
        }

        .input-box input {
            border: none;
            background: transparent;
            text-align: center;
            font-size: 14px;
            pointer-events: none;
            width: 100%;
        }

        .input-box img {
            width: 18px;
            cursor: pointer;
        }

        .panel-title-text {
            color: #6d710d;
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
            border-top: 1px solid #6d710d;
        }

        .row-right {
            display: flex;
            align-items: center;
            gap: 1px;
        }

        .row-right img {
            width: 22px;
            height: 22px; /* آیکون‌های سند و آمار */
        }

        .row-rightt img {
            display: flex;
            justify-content: center;
            width: 24px;
            height: 24px;
            margin-right: 150px;
        }

        .weight {
            width: 100px;
            height: 30px;
        }

        .row-right span {
            font-size: 15px;
            color: #000;
        }

        .row-left img {
            width: 18px;
            cursor: pointer;
        }

        /* دکمه ثبت */
        .submit-btn {
            width: 262px;
            height: 62px;
            margin-top: 130px;
            margin-right: 50px;
            background-color: #6d710d;
            border: none;
            border-radius: 30px;
            color: #d0d2a1;
            font-family: 'IranSans';
            font-size: 18px;
            cursor: pointer;
        }

        /* فوتر نهایی */
        .footer-container {
            width: 100%;
            height: 160px;
            bottom: 0;
            border-top: 1px solid #e0e0e0;
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

        .update-success {
            background-color: limegreen;
            color: white;
            text-align: center;
            padding: 10px;
            margin-bottom: 20px;
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
        <a href="{{ route('manager.products.index') }}" class="back-btn">
            <img src="/icons & images/Arrow - Left 2.png" alt="Back"/>
        </a>
        محصولات
    </div>

    @session('update-success')
    <div class="update-success">
        اطلاعات با موفقیت بروزرسانی شد.
    </div>
    @endsession

    <!-- باکس لیست مدیریت -->
    <form action="{{ route('manager.products.update',['product' => $product]) }}" method="post" class="main-panel-box">
        @csrf
        @method('PUT')
        <div class="panel-title-text">{{ $product->name }}</div>

        <!-- لیست محصولات -->
        <div class="list-row">
            <div class="row-rightt">
                <img src="/icons & images/pestashio.png" alt="Icon"/>
                <!-- از آیکون Document خودت استفاده کن -->
            </div>
        </div>

        <!-- لیست فروش -->
        <div class="list-row">
            <div class="row-right">
                <img src="/icons & images/وزن.png" alt="Icon" class="weight"/>
                <span>وزن: (کیلوگرم)</span>
            </div>
            <div class="row-left">
                <div class="input-box">
                    <input name="quantity" value="{{ $product->quantity }}" id="stockInput" type="text"/>
                    <img
                        src="/icons & images/Edit.png"
                        onclick="enableEdit('stockInput')"
                        alt="edit"
                    />
                </div>
            </div>
        </div>

        <!-- آمار فروش -->
        <div class="list-row">
            <div class="row-right">
                <img src="/icons & images/Chart.png" alt="Icon"/>
                <!-- آیکون نموداری -->
                <span>قیمت</span>
            </div>
            <div class="row-left">
                <div class="input-box">
                    <input name="price" id="priceInput" type="text" value="{{ $product->price }}"/>
                    <img
                        src="/icons & images/Edit.png"
                        onclick="enableEdit('priceInput')"
                        alt="edit"
                    />
                </div>
            </div>
        </div>
        <div class="list-row"></div>

        <button class="submit-btn">ثبت</button>
    </form>
    <!-- فوتر -->
    <footer class="footer-container">
        <!-- اطلاعات تماس سمت راست -->
        <div class="footer-right-contact">
            <div class="contact-item">
                <img src="/icons & images/Message.png" alt="Email"/>
                <span>peste.sh@gmail.com :ایمیل</span>
            </div>
            <div class="contact-item">
                <img src="/icons & images/Location.png" alt="Loc"/>
                <span>آدرس: کیلومتر ۲۰ بجنورد</span>
            </div>
            <div class="contact-item">
                <img src="/icons & images/Call.png" alt="Phone"/>
                <span>تلفن: ۰۵۸۳۳۲۴۱۵۶</span>
            </div>
        </div>
        <!-- آیکون‌های مجازی سمت چپ -->
        <div class="footer-left-socials">
            <img
                src="/icons & images/Instagram.png"
                onclick="window.location.href = 'https://instagr.am/peste'"
                alt="IG"
            />
            <img
                src="/icons & images/Telegram.png"
                onclick="window.location.href = 'https://t.me/peste'"
                alt="TG"
            />
            <img
                src="/icons & images/Enamad.png"
                onclick="window.location.href = '#'"
                alt="Enamad"
            />
            <img
                src="/icons & images/Youtube.png"
                onclick="window.location.href = '#'"
                alt="YT"
            />
        </div>
    </footer>
</div>

<script>
    /* اجازه ویرایش عدد با کلیک */
    function enableEdit(id) {
        const input = document.getElementById(id)
        input.style.pointerEvents = 'auto'
        input.focus()
    }

</script>
</body>
</html>
