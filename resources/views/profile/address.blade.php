<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=360, initial-scale=1.0"/>
    <title>آدرس من | Pistachio</title>
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
            font-family: 'iranFont';
            display: flex;
            justify-content: center;
            align-items: flex-start; /* برای اینکه از بالا شروع شود */
            min-height: 100vh;
            overflow: hidden; /* جلوگیری از اسکرول بدنه اصلی صفحه */
        }

        .app-frame {
            width: 360px;
            height: 800px; /* ارتفاع ثابت */
            background-color: #ffffff;
            position: relative;
            overflow-y: auto; /* اجازه اسکرول فقط در داخل فریم */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
        }

        /* ======= هدر ======= */
        .header-top {
            height: 74px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 15px;
            background: #fff;
            flex-shrink: 0; /* جلوگیری از تغییر اندازه هدر */
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
            background-color: #6d710d;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: #d0d2a1;
            font-size: 19px;
            font-weight: bold;
            flex-shrink: 0; /* جلوگیری از تغییر اندازه نوار سبز */
        }

        .sub-header-green .back-btn {
            position: absolute;
            left: 15px;
            cursor: pointer;
        }

        .sub-header-green .back-btn img {
            width: 20px;
        }

        /* ======= محتوای اصلی ======= */
        .main-content {
            flex-grow: 1; /* اجازه رشد به محتوا برای پر کردن فضا */
            width: 359px; /* کمی کوچکتر از عرض فریم برای ظاهر بهتر */
            margin: 10px auto; /* وسط چین کردن و کمی فاصله از بالا/پایین */
            border: 1px solid #bfbfbf;
            border-radius: 20px;
            padding: 0;
            background: #fff;
            overflow: hidden; /* جلوگیری از بیرون زدن محتوا */
            display: flex;
            flex-direction: column; /* چیدن عناصر داخلی به صورت عمودی */
        }

        .section-title {
            color: #6d710d;
            font-size: 17px;
            font-weight: bold;
            margin: 16px 18px 12px 0;
            text-align: right;
            padding-top: 5px; /* کمی فاصله از بالا */
        }

        .separator {
            width: 100%;
            height: 1px;
            background-color: #b7b7b7;
        }

        .row-block {
            padding: 14px 18px;
        }

        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .field-label {
            color: #222;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
            min-width: 84px;
            justify-content: flex-start;
        }

        .field-label img {
            width: 18px;
            height: 18px;
        }

        .select-box {
            position: relative;
            width: 180px;
            height: 39px;
            flex-shrink: 0;
        }

        .select-box select {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 12px;
            background: #eaeaea;
            color: #333;
            font-size: 14px;
            font-family: 'IranSans', Tahoma, sans-serif;
            padding: 0 45px 0 15px;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            outline: none;
            cursor: pointer;
            text-align: center;
            text-align-last: center;
            direction: rtl; /* برای راست چین شدن متن داخل select */
        }

        .select-box::after {
            content: '⌄';
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-54%);
            font-size: 22px;
            color: #2e2740;
            pointer-events: none;
        }

        .address-label-wrap {
            padding: 14px 18px 8px 18px;
        }

        .address-box-wrap {
            padding: 0 18px 18px 18px;
            flex-grow: 1; /* اجازه رشد برای پر کردن فضا */
        }

        .address-box {
            position: relative;
            width: 100%; /* پر کردن عرض wrapper */
            height: 100%; /* پر کردن ارتفاع wrapper */
            background: #eaeaea;
            border-radius: 14px;
            overflow: hidden;
            display: flex;
            flex-direction: column; /* برای اینکه محتوا داخلش ستون بچینه */
        }

        .address-display,
        .address-input {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: transparent;
            resize: none;
            font-family: 'IranSans', Tahoma, sans-serif;
            font-size: 15px;
            color: #222;
            line-height: 1.8; /* افزایش فاصله خطوط */
            padding: 55px 18px 18px 18px; /* فضای بیشتر برای آیکون ادیت */
            text-align: right;
            direction: rtl; /* برای راست چین شدن متن */
            flex-grow: 1; /* اجازه رشد به textarea/div */
        }


        .address-box.editing .address-display {
            display: none;
        }

        .address-box.editing .address-input {
            display: block;
        }

        .edit-btn {
            position: absolute;
            top: 12px;
            left: 14px;
            background: transparent;
            border: none;
            padding: 0;
            margin: 0;
            cursor: pointer;
            z-index: 2;
        }

        .edit-btn img {
            width: 18px;
            height: 18px;
        }

        .submit-wrap {
            padding: 34px 28px 22px;
            margin-top: auto; /* چسباندن دکمه به پایین */
            flex-shrink: 0; /* جلوگیری از تغییر اندازه */
        }

        .submit-btn {
            width: 100%;
            height: 61px;
            border: none;
            border-radius: 30px;
            background: #73770b; /* رنگ سبز زیتونی */
            color: #f3f0de;
            font-family: 'IranSans', Tahoma, sans-serif;
            font-size: 20px;
            cursor: pointer;
            box-shadow: 0 5px 15px rgba(115, 119, 11, 0.4); /* سایه برای دکمه */
        }

        /* ======= فوتر ======= */
        .footer-container {
            width: 100%;
            min-height: 160px;
            border-top: 1px solid #e0e0e0;
            display: flex;
            padding: 15px;
            justify-content: space-between;
            margin-top: auto; /* چسباندن فوتر به پایین */
            flex-shrink: 0; /* جلوگیری از تغییر اندازه */
            background: #fff; /* اطمینان از پس زمینه سفید */
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

        @media (max-width: 390px) {
            body {
                background: #fff;
            }

            .app-frame {
                box-shadow: none;
                width: 100%; /* در ابعاد کوچکتر عرض کامل را بگیرد */
                height: 100vh; /* در ابعاد کوچکتر ارتفاع کامل صفحه را بگیرد */
                border-radius: 0;
            }

            .main-content {
                width: 100%; /* در ابعاد کوچکتر عرض کامل را بگیرد */
            }
        }
    </style>
</head>
<body>
<div class="app-frame">
    <!-- هدر -->
    <header class="header-top">
        <a href="{{ route('home') }}" class="logo-right">
            <img src="{{ asset('icons & images/logo2.png') }}" alt="Logo"/>
        </a>
        <div class="icons-left">
            <a href="{{ route('profile') }}">
                <img src="{{ asset('icons & images/Profile.png') }}" alt="Profile"/>
            </a>
            <a href="{{ route('cart') }}">
                <img src="{{ asset('icons & images/Bag 2.png') }}" alt="Cart"/>
            </a>
        </div>
    </header>

    <!-- نوار سبز -->
    <div class="sub-header-green">
        <div class="back-btn" onclick="history.back()">
            <img src="{{ asset('icons & images/Arrow - Left 2.png') }}" alt="Back"/>
        </div>
        آدرس
    </div>

    <!-- بخش اصلی -->
    <div class="main-content">
        <div class="section-title">آدرس من</div>
        <div class="separator"></div>

        <?php
        $address = auth()->user()->address;
        ?>
        @if(session('success'))
            {{ session('success') }}
        @endif
        <form action="{{ route('profile.address.update') }}" method="post">
            @csrf
            <!-- استان -->
            <div class="row-block">
                <div class="info-row">
                    <label class="field-label">
                        <img src="{{ asset('icons & images/Location.png') }}" alt=""/>
                        استان
                    </label>

                    <div class="select-box">
                        <select name="province" id="provinceSelect" data-selected="{{ $address?->province }}">
                            <option value="">انتخاب استان</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="separator"></div>

            <!-- شهر -->
            <div class="row-block">
                <div class="info-row">
                    <label class="field-label">
                        <img src="{{ asset('icons & images/Location.png') }}" alt=""/>
                        شهر
                    </label>

                    <div class="select-box">
                        <select name="city" id="citySelect" data-selected="{{ $address?->city }}">
                            <option value="">ابتدا استان را انتخاب کنید</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="separator"></div>

            <!-- آدرس -->
            <div class="address-label-wrap">
                <label class="field-label">
                    <img src="{{ asset('icons & images/Location.png') }}" alt=""/>
                    آدرس
                </label>
            </div>

            <div class="address-box-wrap">
                <div class="address-box" id="addressBox">
                    <button class="edit-btn" id="editAddressBtn" type="button">
                        <img src="{{ asset('icons & images/Edit.png') }}" alt="Edit"/>
                    </button>
                    <textarea name="address" class="address-input" id="addressInput"
                              placeholder="خیابان، کوچه، پلاک، واحد">{{ $address?->address }}</textarea>
                </div>
            </div>

            <div class="separator"></div>

            <!-- دکمه ثبت -->
            <div class="submit-wrap">
                <button class="submit-btn" id="submitBtn">ثبت</button>
            </div>
        </form>
    </div>

    <!-- فوتر -->
    <footer class="footer-container">
        <div class="footer-right-contact">
            <div class="contact-item">
                <img src="{{ asset('icons & images/Message.png') }}" alt=""/><span
                >peste.sh@gmail.com :ایمیل</span
                >
            </div>
            <div class="contact-item">
                <img src="{{ asset('icons & images/Location.png') }}" alt=""/><span
                >آدرس: کیلومتر ۳۰ بجنورد</span
                >
            </div>
            <div class="contact-item">
                <img src="{{ asset('icons & images/Call.png') }}" alt=""/><span>تلفن: ۰۵۸۳۳۲۴۱۵۶</span>
            </div>
        </div>
        <div class="footer-left-socials">
            <img src="{{ asset('icons & images/Instagram.png') }}" alt=""/>
            <img src="{{ asset('icons & images/Telegram.png') }}" alt=""/>
            <img src="{{ asset('icons & images/Enamad.png') }}" alt=""/>
            <img src="{{ asset('icons & images/Youtube.png') }}" alt=""/>
        </div>
    </footer>
</div>

<script>
    const provinceCityData = {
        'آذربایجان شرقی': [
            'آذرشهر',
            'اسکو',
            'اهر',
            'بستان آباد',
            'بناب',
            'تبریز',
            'جلفا',
            'چاراویماق',
            'سراب',
            'شبستر',
            'کلیبر',
            'مراغه',
            'مرند',
            'ملکان',
            'میانه',
            'هریس',
            'هشترود',
            'هوراند',
            'خداآفرین',
            'ورزقان',
            'عجب شیر',
        ],
        'آذربایجان غربی': [
            'ارومیه',
            'اشنویه',
            'بوکان',
            'پیرانشهر',
            'تکاب',
            'چالدران',
            'خوی',
            'سردشت',
            'سلماس',
            'شاهین دژ',
            'ماکو',
            'مهاباد',
            'میاندوآب',
            'نقده',
            'پلدشت',
            'چایپاره',
            'شوط',
            'کشاورز',
            'ربط',
            'بازرگان',
        ],
        اردبیل: [
            'اردبیل',
            'بیله سوار',
            'پارس آباد',
            'خلخال',
            'کوثر',
            'گرمی',
            'مشگین شهر',
            'نمین',
            'نیر',
            'سرعین',
            'اصلاندوز',
            'هیر',
        ],
        اصفهان: [
            'اصفهان',
            'آران و بیدگل',
            'اردستان',
            'برخوار',
            'بوئین و میاندشت',
            'تیران',
            'چادگان',
            'خمینی شهر',
            'خوانسار',
            'سمیرم',
            'شاهین شهر',
            'شهرضا',
            'دهاقان',
            'فریدن',
            'فریدونشهر',
            'فلاورجان',
            'کاشان',
            'گلپایگان',
            'لنجان',
            'مبارکه',
            'نائین',
            'نجف آباد',
            'نطنز',
            'کوهپایه',
            'جرقویه',
            'هرند',
            'ورزنه',
        ],
        البرز: [
            'کرج',
            'فردیس',
            'نظرآباد',
            'هشتگرد',
            'اشتهارد',
            'طالقان',
            'ماهدشت',
            'محمدشهر',
            'مشکین دشت',
            'گرمدره',
            'کمال شهر',
            'چهارباغ',
        ],
        ایلام: [
            'ایلام',
            'آبدانان',
            'ایوان',
            'دهلران',
            'شیروان و چرداول',
            'مهران',
            'ملکشاهی',
            'دره شهر',
            'بدره',
            'چوار',
            'سرابله',
        ],
        بوشهر: [
            'بوشهر',
            'تنگستان',
            'جم',
            'دشتستان',
            'دشتی',
            'دیر',
            'دیلم',
            'کنگان',
            'گناوه',
            'عسلویه',
            'آب پخش',
            'اهرم',
            'برازجان',
            'خورموج',
        ],
        تهران: [
            'تهران',
            'اسلامشهر',
            'اندیشه',
            'بومهن',
            'پاکدشت',
            'پردیس',
            'پرند',
            'پیشوا',
            'تجریش',
            'چهاردانگه',
            'دماوند',
            'رباط کریم',
            'رودهن',
            'ری',
            'شاهدشهر',
            'شریف آباد',
            'شهریار',
            'صالحیه',
            'قدس',
            'قرچک',
            'گلستان',
            'لواسان',
            'ملارد',
            'نسیم شهر',
            'ورامین',
            'باقرشهر',
            'فشم',
            'کهریزک',
        ],
        'چهارمحال و بختیاری': [
            'اردل',
            'بروجن',
            'شهرکرد',
            'فارسان',
            'کوهرنگ',
            'لردگان',
            'سامان',
            'بن',
            'کیار',
            'جونقان',
            'فرخ شهر',
            'هفشجان',
        ],
        'خراسان جنوبی': [
            'بیرجند',
            'قائن',
            'فردوس',
            'طبس',
            'نهبندان',
            'سرایان',
            'سربیشه',
            'درمیان',
            'زیرکوه',
            'بشرویه',
            'خوسف',
            'اسدیه',
        ],
        'خراسان رضوی': [
            'مشهد',
            'نیشابور',
            'سبزوار',
            'تربت حیدریه',
            'تربت جام',
            'قوچان',
            'کاشمر',
            'گناباد',
            'چناران',
            'درگز',
            'خواف',
            'سرخس',
            'فریمان',
            'بردسکن',
            'تایباد',
            'طرقبه',
            'شاندیز',
            'فیروزه',
            'رشتخوار',
            'خلیل آباد',
            'مه ولات',
            'باخرز',
            'کلات',
            'جغتای',
            'جوین',
        ],
        'خراسان شمالی': [
            'بجنورد',
            'اسفراین',
            'شیروان',
            'جاجرم',
            'فاروج',
            'مانه و سملقان',
            'گرمه',
            'راز',
            'آشخانه',
            'قاضی',
            'صفی آباد',
        ],
        خوزستان: [
            'اهواز',
            'آبادان',
            'اندیمشک',
            'ایذه',
            'باغ ملک',
            'بندر امام خمینی',
            'بندر ماهشهر',
            'بهبهان',
            'خرمشهر',
            'دزفول',
            'دشت آزادگان',
            'رامهرمز',
            'شادگان',
            'شوش',
            'شوشتر',
            'مسجدسلیمان',
            'هندیجان',
            'امیدیه',
            'حمیدیه',
            'لالی',
            'رامشیر',
            'باوی',
            'کارون',
            'گتوند',
            'هویزه',
            'آغاجاری',
            'اندیکا',
            'ماهشهر',
        ],
        زنجان: [
            'زنجان',
            'ابهر',
            'خدابنده',
            'خرمدره',
            'طارم',
            'ماهنشان',
            'ایجرود',
            'سلطانیه',
            'قیدار',
            'آب بر',
            'زرین آباد',
        ],
        سمنان: [
            'سمنان',
            'شاهرود',
            'دامغان',
            'گرمسار',
            'مهدی شهر',
            'آرادان',
            'سرخه',
            'میامی',
            'ایوانکی',
            'بسطام',
            'شهمیرزاد',
        ],
        'سیستان و بلوچستان': [
            'زاهدان',
            'ایرانشهر',
            'چابهار',
            'خاش',
            'زابل',
            'سراوان',
            'سرباز',
            'کنارک',
            'نیکشهر',
            'میرجاوه',
            'زهک',
            'راسک',
            'قصرقند',
            'دلگان',
            'فنوج',
            'هامون',
            'نیمروز',
            'محمدان',
            'بمپور',
        ],
        فارس: [
            'شیراز',
            'آباده',
            'اقلید',
            'استهبان',
            'جهرم',
            'داراب',
            'سپیدان',
            'فسا',
            'فیروزآباد',
            'کازرون',
            'لار',
            'لامرد',
            'مرودشت',
            'ممسنی',
            'نی ریز',
            'نورآباد',
            'اقلید',
            'خرامه',
            'خنج',
            'زرین دشت',
            'فراشبند',
            'قیروکارزین',
            'کوار',
            'مهر',
            'ارسنجان',
            'گراش',
            'اوز',
        ],
        قزوین: [
            'قزوین',
            'آبیک',
            'البرز',
            'بوئین زهرا',
            'تاکستان',
            'محمدیه',
            'محمودآباد نمونه',
            'شال',
            'اقبالیه',
            'ضیاآباد',
        ],
        قم: ['قم', 'جعفریه', 'کهک', 'قنوات', 'دستجرد', 'سلفچگان'],
        کردستان: [
            'سنندج',
            'سقز',
            'بانه',
            'مریوان',
            'قروه',
            'بیجار',
            'کامیاران',
            'دیواندره',
            'دهگلان',
            'سروآباد',
            'موچش',
            'یاسوکند',
        ],
        کرمان: [
            'کرمان',
            'رفسنجان',
            'جیرفت',
            'سیرجان',
            'بم',
            'زرند',
            'کهنوج',
            'شهربابک',
            'بردسیر',
            'راور',
            'عنبرآباد',
            'بافت',
            'منوجان',
            'رودبار جنوب',
            'قلعه گنج',
            'فاریاب',
            'کوهبنان',
            'ریگان',
            'نرماشیر',
            'فهرج',
            'انار',
            'ماهان',
        ],
        کرمانشاه: [
            'کرمانشاه',
            'اسلام آباد غرب',
            'پاوه',
            'جوانرود',
            'سرپل ذهاب',
            'سنقر',
            'قصر شیرین',
            'کنگاور',
            'گیلانغرب',
            'هرسین',
            'روانسر',
            'دالاهو',
            'ثلاث باباجانی',
            'صحنه',
        ],
        'کهگیلویه و بویراحمد': [
            'یاسوج',
            'دوگنبدان',
            'دهدشت',
            'لیکک',
            'سی سخت',
            'چرام',
            'باشت',
            'پاتاوه',
            'قلعه رئیسی',
            'سوق',
            'مادوان',
        ],
        گلستان: [
            'گرگان',
            'گنبد کاووس',
            'علی آباد کتول',
            'آق قلا',
            'بندر ترکمن',
            'کردکوی',
            'مینودشت',
            'آزادشهر',
            'رامیان',
            'گالیکش',
            'کلاله',
            'مراوه تپه',
            'اینچه برون',
            'نوکنده',
        ],
        گیلان: [
            'رشت',
            'انزلی',
            'لاهیجان',
            'آستارا',
            'لنگرود',
            'رودسر',
            'فومن',
            'صومعه سرا',
            'تالش',
            'آستانه اشرفیه',
            'رضوانشهر',
            'رودبار',
            'شفت',
            'ماسال',
            'املش',
            'سیاهکل',
            'خمام',
            'کوچصفهان',
        ],
        لرستان: [
            'خرم آباد',
            'بروجرد',
            'دورود',
            'الیگودرز',
            'کوهدشت',
            'نورآباد',
            'ازنا',
            'الشتر',
            'پلدختر',
            'چگنی',
            'سپیددشت',
            'سراب دوره',
            'فیروزآباد',
        ],
        مازندران: [
            'ساری',
            'آمل',
            'بابل',
            'بابلسر',
            'بهشهر',
            'تنکابن',
            'جویبار',
            'چالوس',
            'رامسر',
            'سوادکوه',
            'قائمشهر',
            'گلوگاه',
            'محمودآباد',
            'نکا',
            'نور',
            'نوشهر',
            'فریدونکنار',
            'عباس آباد',
            'کلاردشت',
            'مرزن آباد',
            'زیرآب',
            'پل سفید',
            'شیرگاه',
            'کیاسر',
            'رستمکلا',
            'سلمان شهر',
            'ایزدشهر',
            'رویان',
        ],
        مرکزی: [
            'اراک',
            'ساوه',
            'خمین',
            'محلات',
            'دلیجان',
            'شازند',
            'تفرش',
            'آشتیان',
            'زرندیه',
            'کمیجان',
            'مأمونیه',
            'پرندک',
            'نراق',
        ],
        هرمزگان: [
            'بندرعباس',
            'بندر لنگه',
            'قشم',
            'کیش',
            'میناب',
            'حاجی آباد',
            'رودان',
            'جاسک',
            'پارسیان',
            'بستک',
            'ابوموسی',
            'فین',
            'درگهان',
            'هرمز',
        ],
        همدان: [
            'همدان',
            'ملایر',
            'نهاوند',
            'تویسرکان',
            'کبودرآهنگ',
            'رزن',
            'بهار',
            'اسدآباد',
            'فامنین',
            'قهاوند',
            'لالجین',
            'جورقان',
        ],
        یزد: [
            'یزد',
            'میبد',
            'اردکان',
            'بافق',
            'تفت',
            'مهریز',
            'ابرکوه',
            'اشکذر',
            'خضرآباد',
            'هرات',
            'زارچ',
            'شاهدیه',
            'حمیدیا',
        ],
    }

    const provinceSelect = document.getElementById('provinceSelect')
    const citySelect = document.getElementById('citySelect')


    loadProvinces()
    if (provinceSelect.dataset?.selected && citySelect.dataset?.selected) {
        provinceSelect.value = provinceSelect.dataset.selected
        loadCities(provinceSelect.dataset.selected, citySelect.dataset?.selected)
    }


    /* پر کردن لیست استان‌ها */
    function loadProvinces() {
        const provinces = Object.keys(provinceCityData)
        provinces.forEach((province) => {
            const option = document.createElement('option')
            option.value = province
            option.textContent = province
            provinceSelect.appendChild(option)
        })
    }

    /* آپدیت لیست شهرها بر اساس استان */
    function loadCities(selectedProvince, selectedCity = '') {
        citySelect.innerHTML = ''

        if (!selectedProvince || !provinceCityData[selectedProvince]) {
            const option = document.createElement('option')
            option.value = ''
            option.textContent = 'ابتدا استان را انتخاب کنید'
            citySelect.appendChild(option)
            return
        }

        const defaultOption = document.createElement('option')
        defaultOption.value = ''
        defaultOption.textContent = 'انتخاب شهر'
        citySelect.appendChild(defaultOption)

        provinceCityData[selectedProvince].forEach((city) => {
            const option = document.createElement('option')
            option.value = city
            option.textContent = city
            if (city === selectedCity) option.selected = true
            citySelect.appendChild(option)
        })
    }


    /* تغییر استان */
    provinceSelect.addEventListener('change', function () {
        loadCities(this.value)
        // Reset city selection when province changes
        citySelect.value = ''
    })

</script>
</body>
</html>
