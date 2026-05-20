<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>ورود</title>

    <style>
        @font-face {
            font-family: 'iranFont';
            src: url('{{ asset('fonts/Iranian Sans.ttf') }}');
        }

        body {
            margin: 0;
            padding: 0;
            background: #fbfbfb;
            font-family: 'iranFont';
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* کادر وسط صفحه */
        .container {
            width: 360px;
            height: 800px;
            background: #fbfbfb;
            position: relative;
            overflow: hidden;
        }

        /* هدر */
        .header {
            width: 100%;
            height: 120px;
            background: #d5d6b0;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            padding-bottom: 20px;
            font-size: 22px;
            font-weight: bold;
            position: relative;
        }

        /* آیکون برگشت */
        .back-icon {
            width: 28px;
            position: absolute;
            left: 20px;
            top: 25px;
            cursor: pointer;
        }

        /* لوگو */
        .logo {
            width: 280px;
            height: 279px;
            margin: 15px auto 0 auto;
            background: #eee;
            border-radius: 10px;
        }

        /* باکس ورودی */
        .input-box {
            width: 262px;
            height: 49px;
            background: #d5d6b0;
            border-radius: 25px;
            margin: 20px auto 0 auto;
            display: flex;
            align-items: center;
            padding: 0 15px;
        }

        .input-box img {
            width: 26px;
            margin-left: 10px;
        }

        .input-box input {
            flex: 1;
            border: none;
            outline: none;
            background: transparent;
            font-size: 15px;
        }

        /* دکمه ورود */
        .login-btn {
            width: 260px;
            height: 55px;
            background: #696d0a;
            border-radius: 30px;
            border: none;
            color: white;
            font-size: 18px;
            margin: 40px auto 10px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
        }

        .login-btn img {
            width: 26px;
            position: absolute;
            left: 20px;
        }

        /* لینک ثبت‌نام */
        .signup-text {
            text-align: center;
            font-size: 14px;
            margin-top: 5px;
        }

        .signup-text span {
            font-weight: bold;
            text-decoration: underline;
            cursor: pointer;
        }

        /* متن پایین */
        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #7d7d7d;
            font-size: 10px;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="header">
        <img
            src="{{ asset('icons & images/Arrow - Left 2.png') }}"
            class="back-icon"
            onclick="history.back()"
        />
        صفحه ورود
    </div>

    <div class="logo">
        <img src="{{ asset('icons & images/logo.png') }}" alt="" />
    </div>

    <form action="{{ route('login-submit') }}" method="post">
        @csrf
        <div class="input-box">
            <input name="username" value="{{ old('username') }}" type="text" id="username" placeholder="نام کاربری" />
            <img src="{{ asset('icons & images/Profile.png') }}" />
        </div>

        <div class="input-box">
            <input name="password" value="{{ old('password') }}" type="password" id="password" placeholder="رمز عبور" />
            <img src="{{ asset('icons & images/Lock.png') }}" />
        </div>

        @error('login')
            {{ $message }}
        @enderror
        <button class="login-btn">
            ورود
            <img src="{{ asset('icons & images/Login.png') }}" />
        </button>
    </form>

    <div class="signup-text">
        حساب نداری؟ <a href="{{ route('signin') }}">همین الان یکی بساز</a>
    </div>

    <div class="footer">ورود شما به معنای پذیرش شرایط فروشگاه و قوانین حریم خصوصی است.</div>
</div>
</body>
</html>
