<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=360, initial-scale=1.0"/>
    <title>اطلاعات حساب کاربری | Pistachio</title>
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
            align-items: center;
            min-height: 100vh;
        }

        .app-frame {
            width: 360px;
            height: 800px;
            background-color: #ffffff;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* هدر و نوار سبز */
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
        }

        .header-top .icons-left {
            display: flex;
            gap: 15px;
        }

        .header-top .icons-left img {
            width: 26px;
        }

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

        /* بخش اصلی */
        .main-panel-box {
            width: 360px;
            height: 506px;
            padding: 15px;
            display: flex;
            flex-direction: column;
        }

        .panel-title-text {
            color: #6d710d;
            font-weight: bold;
            font-size: 17px;
            margin-bottom: 10px;
        }

        .info-form {
            display: flex;
            flex-direction: column;
        }

        .info-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-top: 1px solid #6d710d;
        }

        .row-right {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .row-right img {
            width: 20px;
        }

        .input-container {
            position: relative;
            display: flex;
            align-items: center;
            width: 170px;
        }

        .gray-input {
            background: #eaeaea;
            border: none;
            border-radius: 12px;
            padding: 8px 12px 8px 35px;
            width: 100%;
            font-family: 'IranSans';
            font-size: 13px;
            text-align: center;
        }

        .edit-icon {
            position: absolute;
            left: 10px;
            width: 16px;
            cursor: pointer;
            opacity: 0.7;
        }

        .password-box {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .submit-btn {
            width: 262px;
            height: 62px;
            background: #6d710d;
            color: #d0d2a1;
            border: none;
            border-radius: 30px;
            margin: 50px auto;
            margin-top: 75px;
            font-weight: bold;
            font-size: 20px;
            cursor: pointer;
        }

        /* فوتر */
        .footer-container {
            width: 100%;
            height: 160px;
            position: absolute;
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
        }
    </style>
</head>

<body>
<div class="app-frame">
    <header class="header-top">
        <div class="logo-right">
            <a href="{{ route('home') }}"><img src="{{ asset('icons & images/logo2.png') }}" alt="Logo"/></a>
        </div>
        <div class="icons-left">
            <a href="{{ route('profile') }}">
                <img src="{{ asset('icons & images/Profile.png') }}" alt=""/>
            </a>
            <a href="{{ route('cart') }}">
                <img src="{{ asset('icons & images/Bag 2.png') }}" alt=""/>
            </a>
        </div>
    </header>

    <div class="sub-header-green">
        <div class="back-btn" onclick="history.back()">
            <img src="{{ asset('icons & images/Arrow - Left 2.png') }}" alt=""/>
        </div>
        اطلاعات حساب کاربری
    </div>

    <div class="main-panel-box">
        <div class="panel-title-text">حساب کاربری من</div>
        <?php
        $user = auth()->user();
        ?>
        @if(session('success'))
            <div>{{ session('success') }}</div>
        @endif
        <form class="info-form" action="{{ route('profile.info.update') }}" method="post">
            @csrf
            @method('PUT')
            <div class="info-row">
                <div class="row-right">
                    <img src="{{ asset('icons & images/Info Square.png') }}" alt=""/><span>نام</span>
                </div>
                <div class="input-container">
                    <input name="firstname" value="{{ $user->firstname }}" type="text" id="name" class="gray-input"
                    />
                    <img
                        src="{{ asset('icons & images/Edit.png') }}"
                        alt=""
                        class="edit-icon"
                        onclick="toggleInput('name')"
                    />
                </div>
            </div>

            <div class="info-row">
                <div class="row-right">
                    <img src="{{ asset('icons & images/Info Square.png') }}" alt/><span>نام خانوادگی</span>
                </div>
                <div class="input-container">
                    <input name="lastname" value="{{ $user->lastname }}" type="text" id="family" class="gray-input"
                    />
                    <img
                        src="{{ asset('icons & images/Edit.png') }}"
                        class="edit-icon"
                        onclick="toggleInput('family')"
                        alt=""
                    />
                </div>
            </div>

            <div class="info-row">
                <div class="row-right">
                    <img src="{{ asset('icons & images/Call.png') }}" alt=""/><span>شماره تماس</span>
                </div>
                <div class="input-container">
                    <input
                        name="phone"
                        value="{{ $user->phone }}"
                        type="text"
                        id="phone"
                        class="gray-input"

                    />
                    <img
                        src="{{ asset('icons & images/Edit.png') }}"
                        alt=""
                        class="edit-icon"
                        onclick="toggleInput('phone')"
                    />
                </div>
            </div>

            <div class="info-row">
                <div class="row-right">
                    <img src="{{ asset('icons & images/Password.png') }}"/><span>رمز عبور</span>
                </div>
                <div class="password-box">
                    <div class="input-container">
                        <input
                            name="currentPassword"
                            type="password"
                            id="pass1"
                            class="gray-input"
                            placeholder="رمز فعلی"

                        />
                        <img
                            src="{{ asset('icons & images/Edit.png') }}"
                            class="edit-icon"
                            onclick="toggleInput('pass1')"
                            alt=""
                        />
                    </div>
                    <div class="input-container">
                        <input
                            name="newPassword"
                            type="password"
                            id="pass2"
                            class="gray-input"
                            placeholder="رمز جدید"

                        />
                        <img
                            src="{{ asset('icons & images/Edit.png') }}"
                            class="edit-icon"
                            onclick="toggleInput('pass2')"
                            alt=""
                        />
                    </div>
                </div>
            </div>
            <div class="info-row"></div>
            <button class="submit-btn">ثبت</button>
        </form>
    </div>

    <footer class="footer-container">
        <div class="footer-right-contact">
            <div class="contact-item">
                <img src="{{ asset('icons & images/Message.png') }}"/><span
                >peste.sh@gmail.com :ایمیل</span
                >
            </div>
            <div class="contact-item">
                <img src="{{ asset('icons & images/Location.png') }}"/><span
                >آدرس: کیلومتر ۲۰ بجنورد</span
                >
            </div>
            <div class="contact-item">
                <img src="{{ asset('icons & images/Call.png') }}"/><span>تلفن: ۰۵۸۳۳۲۴۱۵۶</span>
            </div>
        </div>
        <div class="footer-left-socials">
            <img src="{{ asset('icons & images/Instagram.png') }}"/><img
                src="{{ asset('icons & images/Telegram.png') }}"
            /><img src="{{ asset('icons & images/Enamad.png') }}"/><img
                src="{{ asset('icons & images/Youtube.png') }}"
            />
        </div>
    </footer>
</div>
</body>
</html>
