<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=360, initial-scale=1.0" />
    <title>ثبت نام</title>
    <style>
        @font-face {
            font-family: 'iranFont';
            src: url('{{ asset('fonts/Iranian Sans.ttf') }}');
        }

        html,
        body {
            margin: 0;
            padding: 0;
            background: #fbfbfb;
            font-family: 'iranFont';
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 360px;
            height: 800px;
            background: #fbfbfb;
            position: relative;
            overflow: hidden;
        }

        /* هدر منحنی */
        .header-curve {
            width: 120%;
            height: 110px;
            background: #d5d6b0;
            position: absolute;
            top: -35px;
            left: -10%;
            border-bottom-left-radius: 50% 60px;
            border-bottom-right-radius: 50% 60px;
            z-index: 2;
        }

        .header-title {
            position: absolute;
            top: 40px;
            width: 100%;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            z-index: 3;
        }

        .back-btn {
            position: absolute;
            top: 40px;
            left: 25px;
            width: 18px;
            z-index: 4;
            cursor: pointer;
        }

        /* لوگو با اورلپ */
        .logo-box {
            width: 100%;
            text-align: center;
            margin-top: 85px;
            position: relative;
            z-index: 1;
        }

        .logo-box img {
            width: 220px;
            height: auto;
        }

        /* ردیف‌های ورودی */
        .field-row {
            width: 320px;
            margin: 12px auto;
            display: flex;
            flex-direction: row;
            /* در حالت RTL کادر اول سمت راست قرار می‌گیرد */
            gap: 10px;
        }

        /* کادر سمت راست (متن و سپس آیکون) */
        .label-side {
            width: 105px;
            height: 40px;
            background: #d5d6b0;
            border-radius: 24px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            /* شروع از راست در حالت RTL */
            padding: 0 15px;
        }

        .label-side span {
            font-size: 13px;
            color: #333;
            flex-grow: 1;
            /* متن فضای باقی‌مانده را پر می‌کند تا آیکون به چپ رانده شود */
            text-align: right;
        }

        .label-side img {
            width: 20px;
            height: 20px;
            margin-right: 8px;
            /* فاصله آیکون از متن سمت راستش */
        }

        /* کادر سمت چپ (محل تایپ) */
        .input-side {
            flex: 1;
            width: 175px;
            height: 40px;
            background: #d5d6b0;
            border-radius: 24px;
            padding: 0 15px;
            display: flex;
            align-items: center;
        }

        .input-side input {
            width: 100%;
            border: none;
            background: transparent;
            outline: none;
            font-size: 14px;
            text-align: left;
            /* تایپ انگلیسی/فارسی چپ‌چین مطابق عکس */
            color: #555;
            font-family: inherit;
        }

        /* دکمه ثبت نام */
        .submit-btn {
            width: 280px;
            height: 55px;
            background: #696d0a;
            border-radius: 28px;
            margin: 40px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            position: relative;
        }

        .submit-btn span {
            color: #d5d6b0;
            /* رنگ متن همرنگ کادرها */
            font-size: 19px;
            font-weight: bold;
        }

        .submit-btn img {
            position: absolute;
            left: 20px;
            width: 25px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="header-curve"></div>
    <div class="header-title">ثبت نام</div>
    <img
        src="{{ asset('icons & images/Arrow - Left 2.png') }}"
        class="back-btn"
        onclick="history.back()"
    />

    <div class="logo-box">
        <img src="{{ asset('icons & images/logo.png') }}" alt="Logo"/>
    </div>

    <!-- فیلدها با ترتیب جدید: متن در راست، آیکون در چپِ متن -->
    <form action="{{ route('signin-submit') }}" method="post">
        @csrf
        <div class="field-row">
            <div class="label-side">
                <span>نام</span> <img src="{{ asset('icons & images/Profile.png') }}"/>
            </div>
            <div class="input-side"><input name="firstname" type="text" placeholder="ali"/></div>
        </div>

        <div class="field-row">
            <div class="label-side">
                <span>نام خانوادگی</span> <img src="{{ asset('icons & images/Profile.png') }}"/>
            </div>
            <div class="input-side"><input name="lastname" type="text" placeholder="alizade"/></div>
        </div>

        <div class="field-row">
            <div class="label-side">
                <span>شماره تماس</span> <img src="{{ asset('icons & images/Call.png') }}"/>
            </div>
            <div class="input-side"><input name="phone" type="text" placeholder="09123456789"/></div>
        </div>

        <div class="field-row">
            <div class="label-side">
                <span>نام کاربری</span> <img src="{{ asset('icons & images/Profile.png') }}"/>
            </div>
            <div class="input-side"><input name="username" type="text" placeholder="Pestashio"/></div>
        </div>

        <div class="field-row">
            <div class="label-side">
                <span>رمز عبور</span> <img src="{{ asset('icons & images/Lock.png') }}"/>
            </div>
            <div class="input-side"><input name="password" type="password" placeholder="********"/></div>
        </div>
        <button class="submit-btn">
            <span>ثبت نام</span>
            <img src="{{ asset('icons & images/Upload.png') }}" />
    </button>
    </form>

</div>
</body>
</html>
