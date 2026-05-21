@php use App\Enums\ProductCodeEnum; @endphp
    <!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Home | Pistachio</title>

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
            align-items: flex-start;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
        }

        .app-frame {
            width: 360px;
            height: 1100px;
            background: #ffffff;
            position: relative;
            overflow-y: auto;
            overflow-x: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        /* هدر */
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

        /* اسلایدر بنر */
        .slider {
            width: 360px;
            height: 224px;
            position: relative;
            overflow: hidden;
            direction: ltr;
        }

        .slides {
            display: flex;
            height: 100%;
            transition: transform 0.5s ease;
        }

        .slides img {
            width: 360px;
            height: 224px;
            object-fit: cover;
            flex-shrink: 0;
            user-select: none;
            -webkit-user-drag: none;
        }

        /* دکمه‌ها و نقاط عمومی */
        .nav-btn {
            width: 30px;
            height: 30px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            font-size: 20px;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            user-select: none;
            z-index: 2;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

        .dots {
            display: flex;
            justify-content: center;
            margin-top: 8px;
            gap: 8px;
        }

        .dot {
            width: 10px;
            height: 10px;
            border: 1.7px solid black;
            border-radius: 50%;
            background-color: transparent;
            transition: all 0.3s ease;
        }

        .dot.active {
            background-color: black;
        }

        /* اسلایدر محصولات */
        .product-slider {
            width: 360px;
            height: 224px;
            position: relative;
            overflow: hidden;
            /*direction: ltr;*/
            margin-top: 20px;
        }

        .product-container {
            display: flex;
            height: 100%;
            transition: transform 0.5s ease;
        }

        .product-page {
            width: 360px;
            height: 224px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex-shrink: 0;
            padding: 0 10px;
        }

        .product-card {
            width: 148px;
            height: 200px;
            border: 1px solid #ddd;
            border-radius: 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 8px;
            background: #fff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            user-select: none;
            -webkit-user-drag: none;
        }

        .product-card img {
            width: 100%;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 5px;
            user-select: none;
            -webkit-user-drag: none;
        }

        .product-name {
            font-size: 13px;
            margin-bottom: 4px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            color: #333;
        }

        .product-price {
            font-size: 12px;
            color: #6d7016;
            font-weight: bold;
            direction: rtl;
        }

        .out-of-stock {
            font-size: 10px;
            color: gray;
            background: #710d19;
            padding: 3px 8px;
            border-radius: 5px;
            margin-top: 5px;
        }

        /* استایل سوالات متداول */
        .faq-box {
            width: 358px;
            height: auto;
            min-height: 400px;
            background: #fff;
            border-radius: 14px;
            margin: 20px auto;
            padding: 15px;
            border: 1px solid #ddd;
        }

        .faq-title {
            text-align: center;
            font-size: 18px;
            margin-bottom: 15px;
            color: #6d710d;
            font-weight: bold;
        }

        .faq-item {
            width: 100%;
            border-bottom: 1px solid #e0e0e0;
            padding: 15px 5px;
            cursor: pointer;
        }

        .faq-question {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
        }

        .faq-icon {
            width: 20px;
            transition: transform 0.3s ease;
        }

        .faq-answer {
            background: #f7f7f7;
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
            font-size: 13px;
            display: none;
            line-height: 1.6;
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
            background: #fff;
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
            cursor: pointer;
        }
    </style>
</head>

<body>
<div class="app-frame">
    <header class="header-top">
        <a href="{{ route('home') }}" class="logo-right">
            <img
                src="{{ asset('icons & images/logo2.png') }}"
                alt=""
            />
        </a>
        <div class="icons-left">
            <a href="{{ route('profile') }}"><img
                    src="{{ asset('icons & images/Profile.png') }}"
                    alt=""
                /></a>
            <img
                src="{{ asset('icons & images/Bag 2.png') }}"
                onclick="window.location.href = 'cart.html'"
            />
        </div>
    </header>

    <div class="slider" id="slider">
        <div class="slides" id="slides" dir="rtl">
            <img src="{{ asset('icons & images/banner3.jpeg') }}"/>
            <img src="{{ asset('icons & images/banner2.jpeg') }}">
            <img src="{{ asset('icons & images/banner4.jpeg') }}"/>
            <img src="{{ asset('icons & images/baner1.png') }}"/>
        </div>
        <button class="nav-btn prev" onclick="nextBannerSlide()">‹</button>
        <button class="nav-btn next" onclick="prevBannerSlide()">›</button>
    </div>
    <div class="dots" id="dots">
        <div class="dot active"></div>
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
    </div>

    <div class="product-slider">
        <div class="product-container" id="p-container">
            @foreach($products->chunk(2) as $productsPage)
                <div class="product-page">
                    @foreach($productsPage as $product)
                        @php($image = match ($product->code) {
                            ProductCodeEnum::akbari_sade => asset('icons & images/product1.png'),
                            ProductCodeEnum::kalegoochi_sade => asset('icons & images/product2.png'),
                            ProductCodeEnum::akbari_namaki => asset('icons & images/product1.png'),
                            ProductCodeEnum::kalegoochi_namaki => asset('icons & images/product2.png')
                        })
                        @php($price = fa_digits(number_format($product->price)))
                        <a href="{{ route('product.show',['code' => $product->code ]) }}" class="product-card">
                            <img src="{{ $image  }}" alt="{{ $product->name }}"/>
                            <div class="product-name">{{ $product->name }}</div>
                            <div class="product-price">{{ $price }} تومان</div>
                            @if(!$product->quantity)
                                <div class="out-of-stock">اتمام موجودی</div>
                            @endif
                        </a>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <!-- بخش سوالات متداول -->
    <div class="faq-box">
        <h3 class="faq-title">سوالات متداول</h3>
        <div class="faq-item" onclick="toggleFAQ(0)">
            <div class="faq-question">
                        <span>هزینه ارسال چگونه محاسبه میشود؟</span
                        ><img
                    src="{{ asset('icons & images/Arrow - Left 2.png') }}"
                    class="faq-icon"
                    id="icon-0"
                />
            </div>
            <div class="faq-answer" id="answer-0">
                هزینه ارسال براساس آدرس و وزن مرسوله تعیین می‌شود.
            </div>
        </div>
        <div class="faq-item" onclick="toggleFAQ(1)">
            <div class="faq-question">
                        <span>آیا امکان تحویل حضوری وجود دارد؟</span
                        ><img
                    src="{{ asset('icons & images/Arrow - Left 2.png') }}"
                    class="faq-icon"
                    id="icon-1"
                />
            </div>
            <div class="faq-answer" id="answer-1">بله، با هماهنگی قبلی امکان‌پذیر است.</div>
        </div>
        <div class="faq-item" onclick="toggleFAQ(2)">
            <div class="faq-question">
                        <span>آیا محصولات تازه هستند؟</span
                        ><img
                    src="{{ asset('icons & images/Arrow - Left 2.png') }}"
                    class="faq-icon"
                    id="icon-2"
                />
            </div>
            <div class="faq-answer" id="answer-2">بله، محصولات کاملاً تازه هستند.</div>
        </div>
        <div class="faq-item" onclick="toggleFAQ(3)">
            <div class="faq-question">
                        <span>روش‌های پرداخت به چه صورت است؟</span
                        ><img
                    src="{{ asset('icons & images/Arrow - Left 2.png') }}"
                    class="faq-icon"
                    id="icon-3"
                />
            </div>
            <div class="faq-answer" id="answer-3">آنلاین فعلا فقط امکان‌پذیر هست.</div>
        </div>
        <div class="faq-item" onclick="toggleFAQ(4)">
            <div class="faq-question">
                        <span>آیا امکان بسته‌بندی هدیه وجود دارد؟</span
                        ><img
                    src="{{ asset('icons & images/Arrow - Left 2.png') }}"
                    class="faq-icon"
                    id="icon-4"
                />
            </div>
            <div class="faq-answer" id="answer-4">
                بله، در صورت تمایل بسته‌بندی هدیه انجام می‌شود.
            </div>
        </div>
    </div>

    <footer class="footer-container">
        <div class="footer-right-contact">
            <div class="contact-item">
                <img src="{{ asset('icons & images/Message.png') }}"/><span
                >ایمیل: peste.sh@gmail.com</span
                >
            </div>
            <div class="contact-item">
                <img src="{{ asset('icons & images/Location.png') }}"/><span
                >آدرس: کیلومتر ۳۰ بجنورد</span
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

<script>
    // لاجیک اسلایدر بنر و محصولات...
    function toggleFAQ(index) {
        for (let i = 0; i < 5; i++) {
            let ans = document.getElementById('answer-' + i)
            let icon = document.getElementById('icon-' + i)
            if (i === index) {
                let show = ans.style.display === 'block'
                ans.style.display = show ? 'none' : 'block'
                icon.style.transform = show ? 'rotate(0deg)' : 'rotate(180deg)'
            } else {
                ans.style.display = 'none'
                icon.style.transform = 'rotate(0deg)'
            }
        }
    }

    /* ---- اسلایدر محصولات (جدید) ---- */
    const productContainer = document.getElementById('p-container')
    const totalProductPages = 2
    let currentProductIndex = 0
    let productAutoSlide

    function moveProductSlider(direction) {
        currentProductIndex =
            (currentProductIndex + direction + totalProductPages) % totalProductPages
        productContainer.style.transform = `translateX(${currentProductIndex * 360}px)`
    }

    function startProductAutoSlide() {
        productAutoSlide = setInterval(() => moveProductSlider(1), 15000)
    }

    function resetProductAutoSlide() {
        clearInterval(productAutoSlide)
        startProductAutoSlide()
    }

    startProductAutoSlide()
    productSliderEvents()

    function productSliderEvents() {

        let startX = 0
        let isDragging = false

        // برای رویدادهای لمسی (Touch Events)
        productContainer.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX
        })

        productContainer.addEventListener('touchend', (e) => {
            let endX = e.changedTouches[0].clientX
            if (startX - endX > 50) {
                moveProductSlider(-1)
            } else if (endX - startX > 50) {
                moveProductSlider(1)
            }
        })

        // برای رویدادهای موس و تاچ با استفاده از Pointer Events
        productContainer.addEventListener('mousedown', (e) => {
            isDragging = true
            startX = e.clientX // clientX برای موس و تاچ مشترکه
            productContainer.style.cursor = 'grabbing'; // تغییر ظاهر نشانگر موس
        })

        productContainer.addEventListener('mousemove', (e) => {
            // جلوگیری از اسکرول صفحه در حین کشیدن (drag)
            if (!isDragging) return
            e.preventDefault()
        })

        productContainer.addEventListener('mouseup', (e) => {
            if (!isDragging) return
            isDragging = false
            // productContainer.style.cursor = 'grab'; // بازگرداندن نشانگر موس به حالت عادی

            let endX = e.clientX
            if (startX - endX > 50) {
                moveProductSlider(-1)
            } else if (endX - startX > 50) {
                moveProductSlider(1)
            }
        })

        // قطع کردن حالت کشیدن اگر نشانگر موس از روی المان خارج شد
        productContainer.addEventListener('mouseleave', () => {
            if (!isDragging) return
            isDragging = false
            // productContainer.style.cursor = 'grab';
        })

        // تنظیم اولیه نشانگر موس برای نمایش قابلیت کشیدن
        // productContainer.style.cursor = 'grab';
    }


    /* ---- اسلایدر بنر (همان کد قبلی) ---- */
    const slides = document.querySelector('#slides')
    const dots = document.querySelectorAll('.dot')
    const totalSlides = 4
    let currentIndex = 0
    let bannerAutoSlide

    function updateBannerSlidePosition() {
        slides.style.transform = `translateX(${360 * currentIndex}px)`
        dots.forEach((dot, i) => dot.classList.toggle('active', i === currentIndex))
    }

    function nextBannerSlide() {
        currentIndex = (currentIndex + 1) % totalSlides
        updateBannerSlidePosition()
        resetBannerAutoSlide()
    }

    function prevBannerSlide() {
        currentIndex = (currentIndex - 1 + totalSlides) % totalSlides
        updateBannerSlidePosition()
        resetBannerAutoSlide()
    }

    function startBannerAutoSlide() {
        bannerAutoSlide = setInterval(nextBannerSlide, 20000)
    }

    function resetBannerAutoSlide() {
        clearInterval(bannerAutoSlide)
        startBannerAutoSlide()
    }

    startBannerAutoSlide()

    function bannerSliderEvents() {
        let startX = 0
        let isDragging = false

        slides.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX
        })

        slides.addEventListener('touchend', (e) => {
            let endX = e.changedTouches[0].clientX
            if (startX - endX > 50) {
                prevBannerSlide(-1)
            } else if (endX - startX > 50) {
                nextBannerSlide(1)
            }
        })

        slides.addEventListener('mousedown', (e) => {
            isDragging = true
            startX = e.clientX // از clientX برای mouse و touch استفاده می‌کنیم
            slides.style.cursor = 'grabbing'; // تغییر نشانگر موس به حالت کشیدن
            console.log(startX)
        })

        slides.addEventListener('mousemove', (e) => {
            // برای جلوگیری از اسکرول صفحه در حین کشیدن
            if (!isDragging) return
            e.preventDefault()
        })

        slides.addEventListener('mouseup', (e) => {
            if (!isDragging) return
            isDragging = false
            // slides.style.cursor = 'grab'; // برگرداندن نشانگر موس به حالت عادی

            let endX = e.clientX
            if (startX - endX > 50) {
                prevBannerSlide()
            } else if (endX - startX > 50) {
                nextBannerSlide()
            }
        })

        // اگر mouse از روی المان خارج شد، drag رو قطع کن
        slides.addEventListener('mouseleave', () => {
            if (!isDragging) return
            isDragging = false
            // slides.style.cursor = 'grab';
        })

        // استایل اولیه برای نشون دادن قابلیت کشیدن
        // slides.style.cursor = 'grab';

    }

    bannerSliderEvents()
    // [کدهای قبلی اسلایدرها در اینجا]
</script>
</body>
</html>
