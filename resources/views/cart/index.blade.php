<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>سبد خرید</title>
    <style>
        :root {
            --primary-olive: #6d710d;
            --light-olive: #d0d2a1;
            --card-bg: #e7e7e7;
            --price-gray: #828282;
            /* رنگ خاکستری برای قیمت‌ها */
        }

        @font-face {
            font-family: 'iranFont';
            src: url('{{ asset('fonts/Iranian Sans.ttf') }}');
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'iranFont';
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        /* کانتینر اصلی موبایل */
        .mobile-container {
            width: 360px;
            height: 800px;
            background-color: #ffffff;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* هدر با قوس کمتر و دکمه در چپ */
        .header {
            background-color: var(--light-olive);
            height: 70px;
            /* کمتر شد تا فضای کمتری بگیرد */
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            border-bottom-left-radius: 50% 15px;
            border-bottom-right-radius: 50% 15px;
            padding-top: 10px;
        }

        .header h1 {
            color: #000;
            font-size: 18px;
            margin: 0;
        }

        .back-btn {
            position: absolute;
            left: 20px;
            /* انتقال به سمت چپ */
            top: 25px;
            cursor: pointer;
            width: 20px;
        }

        /* لیست محصولات */
        .cart-items {
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .product-card {
            background-color: var(--card-bg);
            border-radius: 12px;
            display: flex;
            padding: 15px;
            margin-bottom: 15px;
            position: relative;
            transition: all 0.3s ease;
            align-items: center;
        }

        /* آیکون حذف در بالا سمت چپ */
        .close-btn {
            position: absolute;
            top: 8px;
            left: 8px;
            /* انتقال به چپ */
            cursor: pointer;
            width: 18px;
            z-index: 10;
        }

        /* عکس در سمت راست */
        .product-img {
            order: 2;
            /* بردن به سمت راست در ساختار فلکس */
            margin-right: 10px;
        }

        .product-img img {
            width: 75px;
            height: 75px;
            object-fit: contain;
        }

        /* اطلاعات در سمت چپ */
        .product-info {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 5px;
            order: 1;
            /* بردن به سمت چپ */
            text-align: right;
        }

        .product-name {
            font-weight: bold;
            font-size: 15px;
            color: #000;
            /* نام محصول مشکی */
        }

        .price-row {
            display: flex;
            justify-content: flex-start;
            font-size: 13px;
        }

        .price-label {
            color: #000;
            /* لیبل‌ها مشکی */
            margin-left: 5px;
        }

        .price-value {
            font-weight: normal;
            color: var(--price-gray);
            /* مبالغ خاکستری */
        }

        /* بخش مجموع */
        .summary-section {
            padding: 20px;
            background-color: #fcfcfc;
            border-top: 1px solid #eee;
        }

        .summary-title {
            text-align: center;
            color: var(--primary-olive);
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 15px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            color: var(--primary-olive);
            font-weight: bold;
        }

        .summary-row.total {
            border-bottom: none;
            font-size: 18px;
        }

        /* دکمه ثبت سفارش */
        .checkout-btn {
            background-color: var(--primary-olive);
            color: #d0d2a1;
            border: none;
            width: 100%;
            display: block;
            text-align: center;
            box-sizing: border-box;
            padding: 14px;
            border-radius: 25px;
            font-size: 17px;
            cursor: pointer;
            margin-top: 10px;
            font-family: Tahoma;
        }

        /* انیمیشن حذف */
        .fade-out {
            opacity: 0;
            transform: translateX(-20px);
        }

        .empty-text {
            text-align: center;
            color: #999;
            margin-top: 50px;
        }
    </style>
</head>

<body>
<div class="mobile-container">
    <!-- Header -->
    <div class="header">
        <img src="{{ asset('icons & images/Arrow - Left 2.png') }}" alt="Back" class="back-btn"
             onclick="window.history.back()"/>
        <h1>سبد خرید</h1>
    </div>

    <!-- Product List -->
    @if($cart)
        <div class="cart-items" id="cartItems">
            @foreach($cart->items as $item)
                <div class="product-card">
                    <img
                        src="{{ asset('icons & images/Close Square.png') }}"
                        alt="Remove"
                        class="close-btn"
                        onclick="document.querySelector('form#removeCartItemForm{{$item->id}}').submit()"
                    />
                    <form action="{{ route('cart.remove') }}" method="post" id="removeCartItemForm{{$item->id}}">
                        @csrf
                        @method('DELETE')
                        <input name="productId" value="{{$item->product->id}}" type="hidden"/>
                    </form>
                    <a href="{{ route('product.show',['code'=>$item->product->code]) }}" class="product-img">
                        <img src="{{ asset('icons & images/product1.png') }}" alt="Pistachio"/>
                    </a>
                    <div class="product-info">
                        <a href="{{ route('product.show',['code'=>$item->product->code]) }}"
                           class="product-name">{{ $item->product->name }}</a>
                        <div class="price-row">
                            <span class="price-label">قیمت هرکیلو:</span>
                            <span class="price-value">{{ fa_digits(number_format($item->product->price)) }} تومان</span>
                        </div>
                        <div class="price-row">
                            <span class="price-label">قیمت کل:</span>
                            <span class="price-value">{{ fa_digits(number_format($item->price)) }} تومان</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-text">سبد خرید شما خالی است</div>
    @endif

    <!-- Summary Section -->
    @if($cart)
        <div class="summary-section" id="summarySection">
            <div class="summary-title">مجموع کل سبد خرید</div>

            <div class="summary-row">
                <span>جمع جزء</span>
                <span id="subtotal">{{ fa_digits(number_format($cart->totalItemsPrice)) }} تومان</span>
            </div>

            <div class="summary-row">
                <span>حمل و نقل</span>
                <span>{{ fa_digits(number_format($cart->shippingCost)) }} تومان</span>
            </div>

            <div class="summary-row total">
                <span>مجموع</span>
                <span id="total">{{ fa_digits(number_format($cart->totalPrice)) }} تومان</span>
            </div>

            <a href="{{ route('order') }}" class="checkout-btn">ثبت سفارش</a>
        </div>
    @endif
</div>

</body>
</html>
