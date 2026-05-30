<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta
        name="viewport"
        content="width=360, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"
    />
    <title>آمار فروش | Pistachio</title>
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
            font-family: 'iranFont';
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        /* فریم اصلی گوشی - بدون اسکرول */
        .app-frame {
            width: 360px;
            height: 800px;
            background-color: #ffffff;
            position: relative;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            /* جلوگیری از هرگونه اسکرول */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* ======= هدر (ثابت) ======= */
        .header-top {
            height: 74px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 15px;
            background: #fff;
            flex-shrink: 0;
        }

        .header-top .logo-right img {
            height: 55px;
        }

        .header-top .icons-left {
            display: flex;
            gap: 15px;
        }

        .header-top .icons-left img {
            width: 26px;
        }

        /* ======= نوار سبز (ثابت) ======= */
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
            flex-shrink: 0;
        }

        .sub-header-green .back-btn {
            position: absolute;
            left: 15px;
            cursor: pointer;
        }

        .sub-header-green .back-btn img {
            width: 20px;
        }

        /* ======= محتوای اصلی (متناسب شده) ======= */
        .main-container {
            flex: 1;
            /* اشغال فضای باقی‌مانده بین هدر و فوتر */
            padding: 10px 15px;
            display: flex;
            flex-direction: column;
        }

        .content-box {
            border: 1px solid #d1d1d1;
            border-radius: 20px;
            padding: 10px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            height: 100%;
        }

        .analysis-title {
            text-align: center;
            color: #6d710d;
            font-size: 18px;
            font-weight: bold;
            margin: 5px 0;
        }

        .separator {
            width: 100%;
            height: 1px;
            background-color: #d1d1d1;
            margin: 2px 0;
        }

        .section-title-row {
            display: flex;

            gap: 1px;
            margin-top: 5px;
            margin-left: 100px;
        }

        .section-title-row span {
            color: #000;
            font-size: 14px;
            font-weight: 500;
        }

        .section-title-row img {
            width: 18px;
        }

        /* ردیف‌های حاوی دو باکس خاکستری */
        .stat-row {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 5px;
        }

        .value-field {
            background: #eaeaea;
            border-radius: 12px;
            flex: 1;
            height: 39px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            color: #333;
        }

        .label-field {
            background: #eaeaea;
            border-radius: 12px;
            width: 95px;
            height: 39px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            color: #333;
        }

        /* ======= فوتر (ثابت) ======= */
        .footer-container {
            width: 100%;
            height: 160px;
            border-top: 1px solid #e0e0e0;
            display: flex;
            padding: 15px;
            justify-content: space-between;
            flex-shrink: 0;
            background: #fff;
        }

        .footer-right-contact {
            display: flex;
            flex-direction: column;
            gap: 8px;
            text-align: right;
            font-size: 12px;
            color: #333;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .contact-item img {
            width: 18px;
        }

        .footer-left-socials {
            display: flex;
            flex-direction: column;
            gap: 8px;
            align-items: flex-start;
        }

        .footer-left-socials img {
            width: 24px;
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


    <!-- نوار سبز -->
    <div class="sub-header-green">
        <a href="{{ route('manager') }}" class="back-btn">
            <img src="/icons & images/Arrow - Left 2.png" alt="Back"/>
        </a>
        آمار فروش
    </div>

    <!-- محتوا -->
    <div class="main-container">
        <div class="content-box">
            <div class="analysis-title">تحلیل فروش</div>

            <div class="separator"></div>

            <!-- بخش ۱ -->
            <div class="section-title-row">
                <img src="/icons & images/Document.png"/>
                <span>میزان فروش کل</span>
            </div>

            <div class="stat-group">
                <div class="stat-row">
                    <div class="label-field">روز</div>
                    <div class="value-field">{{ toman($dailyTotalSales) }}</div>
                </div>
                <div class="stat-row">
                    <div class="label-field">ماه</div>
                    <div class="value-field">{{ toman($monthlyTotalSales) }}</div>
                </div>
                <div class="stat-row">
                    <div class="label-field">سال</div>
                    <div class="value-field">{{ toman($yearlyTotalSales) }}</div>
                </div>
            </div>

            <div class="separator"></div>

            <!-- بخش ۲ -->
            <div class="section-title-row">
                <img src="/icons & images/Document.png"/>
                <span>میزان فروش محصولات </span>
            </div>

            <div class="stat-group">
                @foreach($products as $product)
                    <div class="stat-row">
                        <div class="label-field">{{ $product->name }}</div>
                        <div class="value-field">{{ toman($product->total_sales) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- فوتر -->
    <footer class="footer-container">
        <div class="footer-right-contact">
            <div class="contact-item">
                <img src="/icons & images/Message.png"/><span
                >peste.sh@gmail.com :ایمیل</span
                >
            </div>
            <div class="contact-item">
                <img src="/icons & images/Location.png"/><span
                >آدرس: کیلومتر ۲۰ بجنورد</span
                >
            </div>
            <div class="contact-item">
                <img src="/icons & images/Call.png"/><span>تلفن: ۰۵۸۳۳۲۴۱۵۶</span>
            </div>
        </div>
        <div class="footer-left-socials">
            <img src="/icons & images/Instagram.png"/><img
                src="/icons & images/Telegram.png"
            /><img src="/icons & images/Enamad.png"/><img
                src="/icons & images/Youtube.png"
            />
        </div>
    </footer>
</div>

<script>
    // اسکریپت برای جلوگیری از اسکرول احتمالی در برخی مرورگرهای موبایل
    document.addEventListener(
        'touchmove',
        function (e) {
            if (e.target.closest('.app-frame')) {
                // اجازه اسکرول نده چون فیت کردیم
            }
        },
        {passive: false},
    )
</script>
</body>
</html>
