<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=360, height=800, initial-scale=1.0"/>
    <title>صفحه محصول - پسته اکبری ساده</title>

    <style>
        @font-face {
            font-family: 'iranFont';
            src: url('{{ asset('fonts/Iranian Sans.ttf') }}');
        }

        body {
            font-family: 'iranFont';
            background-color: #f9f9f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        button {
            font-family: 'iranFont';
        }

        .container {
            width: 360px;
            height: 800px;
            background-color: white;
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
        }

        .header-left {
            display: flex;
            gap: 8px;
        }

        .header-left img {
            width: 28px;
            height: 28px;
        }

        .header-right img {
            width: 65px;
            height: auto;
        }

        /* Banner Slider */
        .banner {
            background-color: #696d0a;
            border-radius: 15px;
            width: 90%;
            height: 180px;
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .banner img {
            width: 230px;
            height: auto;
            object-fit: contain;
        }

        .arrow {
            position: absolute;
            font-size: 24px;
            color: white;
            cursor: pointer;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.25);
            padding: 5px 10px;
            border-radius: 8px;
        }

        .arrow.left {
            right: 10px;
        }

        .arrow.right {
            left: 10px;
        }

        /* Product Box */
        .product-box {
            width: 325px;
            height: 347px;
            margin: 20px auto;
            border: 1px solid #6d710d;
            border-radius: 20px;
            padding: 22px;
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-title {
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px; /* مثل عکس */
        }

        /* NEW — دقیقاً مثل عکس */
        .price-row,
        .amount-row {
            display: flex;
            flex-direction: row-reverse; /* برچسب راست، عدد چپ */
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .price-row {
            font-size: 15px;
            color: gray;
        }

        .amount-row {
            font-weight: bold;
        }

        /* وزن */
        .weight-section {
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .weight-section label {
            margin-bottom: 6px;
            color: gray;
            font-size: 15px;
            text-align: right; /* مثل عکس */
        }

        /* سلکت باکس دقیقا شبیه عکس */
        select {
            width: 100%;
            height: 42px; /* ارتفاع دقیق */
            padding: 8px 12px;
            border: 1px solid #6d710d;
            border-radius: 10px;
            font-size: 16px;
            direction: rtl;
            background-position: left 12px center; /* آیکون چپ */
            background-repeat: no-repeat;
        }

        /* Buttons */
        .buttons {
            display: flex;
            justify-content: space-between;
            flex-direction: row-reverse; /* دکمه سبز راست */
            margin-top: 5px;
        }

        .btn {
            width: 48%;
            height: 48px; /* مثل عکس */
            align-items: center;
            justify-content: center;
            border-radius: 14px;
            font-weight: bold;
            display: flex;
            gap: 8px;
            cursor: pointer;
            border: none;
        }

        .btn img {
            width: 20px;
            height: 20px;
        }

        .btn-add {
            background-color: #6d710d;
            color: #d0d2a1;
        }

        .btn-remove {
            background-color: #710d19;
            color: #cecece;
        }

        /* Bottom */
        .bottom {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 70px;
            background-color: #d0d2a1;
            border-top-left-radius: 200px;
            border-top-right-radius: 200px;
        }

        /* ===== Notification Style (ADDED) ===== */

        .notify-overlay {
            position: absolute;
            inset: 0;
            display: none;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.25);
            z-index: 1000;
        }

        .notify-overlay.show {
            display: flex;
        }

        .notify-box {
            width: 280px;
            background: #fff;
            border-radius: 20px;
            padding: 20px;
            text-align: center;
        }

        .notify-text {
            font-size: 16px;
            margin-bottom: 20px;
            color: #6d710d;
            font-weight: bold;
        }

        .notify-buttons {
            display: flex;
            gap: 10px;
        }

        .notify-buttons button, .notify-buttons a {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 13px;
            border: none;
            border-radius: 12px;
            height: 40px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
        }

        .notify-primary {
            background: #6d710d;
            color: #d0d2a1;
        }

        .notify-secondary {
            background: #6d710d;
            color: #d0d2a1;
            opacity: 0.9;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- Notification (ADDED) -->
    <div class="notify-overlay" id="notifyOverlay">
        <div class="notify-box">
            <div class="notify-text" id="notifyText"></div>

            <div class="notify-buttons">
                <button class="notify-secondary" id="notifyBtn1"></button>
                <a href="#" class="notify-primary" id="notifyBtn2"></a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <div class="header">
        <div class="header-left">
            <a href="{{ route('cart') }}">
                <img src="{{ asset('icons & images/Bag.png') }}" alt="سبد خرید"/>
            </a>
            <a href="{{ route('profile') }}"><img src="{{ asset('icons & images/Profile.png') }}"
                                                  alt="حساب کاربری"/></a>
        </div>
        <a href="{{ route('home') }}" class="header-right">
            <img src="{{ asset('icons & images/logo2.png') }}" alt="لوگو"/>
        </a>
    </div>

    <!-- Banner -->
    <div class="banner">
        <span class="arrow left" onclick="prevImage()">&#10095;</span>
        <img id="banner-img" src="{{ asset('icons & images/product1.png') }}" alt="banner"/>
        <span class="arrow right" onclick="nextImage()">&#10094;</span>
    </div>

    <!-- Product Info -->
    <form action="{{ route('cart.add') }}" method="post" class="product-box">
        @csrf
        <input name="productId" value="{{ $product->id }}" type="hidden">
        <div class="product-title">{{ $product->name }}</div>

        <div class="price-row">
            <span>قیمت هر کیلوگرم</span>
            <span id="price-per-kg">{{ fa_digits(number_format($product->price)) }} تومان</span>
        </div>

        @php($cartItem = auth()->user()?->cart?->items()->where('product_id',$product->id)->first())
        <div class="weight-section">
            <label for="weight-select">انتخاب وزن</label>

            <select name="amount" id="weight-select" onchange="updatePrice()">
                <option @selected(old('amount', $cartItem?->amount) == 0.5) value="0.5">۵۰۰ گرم</option>
                <option @selected(old('amount', $cartItem?->amount) == 1) value="1" selected>۱ کیلوگرم</option>
                <option @selected(old('amount', $cartItem?->amount) == 2) value="2">۲ کیلوگرم</option>
                <option @selected(old('amount', $cartItem?->amount) == 3) value="3">۳ کیلوگرم</option>
                <option @selected(old('amount', $cartItem?->amount) == 4) value="4">۴ کیلوگرم</option>
                <option @selected(old('amount', $cartItem?->amount) == 5) value="5">۵ کیلوگرم</option>
            </select>
        </div>

        <div class="amount-row">
            <span>مبلغ محصول</span>
            <span id="product-price">{{fa_digits(number_format($product->price))}} تومان</span>
        </div>

        <div class="buttons">
            @if(!$cartItem)
                <button @guest type="button" onclick="shouldBeLoggedInPopup()" @endguest class="btn btn-add">
                    <img src="{{ asset('icons & images/Bag.png') }}"/> افزودن به سبد
                </button>
            @else
                <button form="removeFromCartForm" class="btn btn-remove">
                    <img src="{{ asset('icons & images/Close Square.png') }}"/> حذف از سبد
                </button>
            @endif
        </div>
    </form>
    <form action="{{ route('cart.remove') }}" method="post" id="removeFromCartForm">
        @csrf
        @method('DELETE')
        <input name="productId" value="{{ $product->id }}" type="hidden">
    </form>

    <div class="bottom"></div>
</div>

<script>
    const pricePerKg = {{ $product->price }};
    const weightSelect = document.getElementById('weight-select')
    const productPrice = document.getElementById('product-price')

    function formatNumber(num) {
        return num.toLocaleString('fa-IR')
    }

    function updatePrice() {
        const weight = parseInt(weightSelect.value)
        const price = (pricePerKg * weight)
        productPrice.textContent = `${formatNumber(price)} تومان`
    }

    const images = ['{!! asset('icons & images/product1.png') !!}', '{!! asset('icons & images/Bitmap.png') !!}']
    let index = 0

    function showImage() {
        document.getElementById('banner-img').src = images[index]
    }

    function nextImage() {
        index = (index + 1) % images.length
        showImage()
    }

    function prevImage() {
        index = (index - 1 + images.length) % images.length
        showImage()
    }

    /* ===== Notification Logic (ADDED) ===== */

    let isLoggedIn = false

    const notifyOverlay = document.getElementById('notifyOverlay')
    const notifyText = document.getElementById('notifyText')
    const btn1 = document.getElementById('notifyBtn1')
    const btn2 = document.getElementById('notifyBtn2')

    function openNotify(text, b1, b1Action, b2, b2Href) {
        notifyText.innerText = text

        btn1.innerText = b1
        btn2.innerText = b2

        btn1.onclick = b1Action
        btn2.href = b2Href

        notifyOverlay.classList.add('show')
    }

    function closeNotify() {
        notifyOverlay.classList.remove('show')
    }

    @if(session('add-success'))
    openNotify(
        'محصول با موفقیت به سبد خرید شما اضافه شد.',
        'ادامه خرید',
        closeNotify,
        'مشاهده سبد خرید',
        '{{ route('cart') }}'
    )
    @endif
    function shouldBeLoggedInPopup() {
        openNotify(
            'ابتدا وارد حساب کاربری خود شوید.',
            'ادامه خرید',
            closeNotify,
            'ورود',
            '{{ route('login') }}',
        )
    }

    // document.querySelector('.btn-add').addEventListener('click', function () {
    //     if (!isLoggedIn) {
    //         openNotify(
    //             'ابتدا وارد حساب کاربری خود شوید.',
    //             'ادامه خرید',
    //             closeNotify,
    //             'ورود',
    //             function () {
    //                 window.location.href = 'login.html'
    //             },
    //         )
    //     } else {
    //         openNotify(
    //             'محصول با موفقیت به سبد خرید شما اضافه شد.',
    //             'ادامه خرید',
    //             closeNotify,
    //             'مشاهده سبد خرید',
    //             function () {
    //                 window.location.href = 'cart.html'
    //             },
    //         )
    //     }
    // })

    // document.querySelector('.btn-remove').addEventListener('click', function () {
    //     openNotify(
    //         'محصول با موفقیت از سبد خرید حذف شد.',
    //         'ادامه خرید',
    //         closeNotify,
    //         'مشاهده سبد خرید',
    //         function () {
    //             window.location.href = 'cart.html'
    //         },
    //     )
    // })
</script>
</body>
</html>
