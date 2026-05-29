<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>جزئیات سفارش</title>
    <style>
        :root {
            --header-bg: #d5d6b0;
            --field-bg: #d5d6b0;
            --button-bg: #696d0a;
            --text-color: #000000;
            --placeholder-color: #888;
            --error-border-color: #e74c3c;
        }

        @font-face {
            font-family: 'iranFont';
            src: url('{{ asset('fonts/Iranian Sans.ttf') }}');
        }

        body {
            font-family: 'iranFont';
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            padding-top: 20px;
        }

        .order-details-container {
            width: 360px;
            height: 800px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .header {
            background-color: var(--header-bg);
            height: 120px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            border-bottom-left-radius: 50% 25px;
            border-bottom-right-radius: 50% 25px;
        }

        .header h1 {
            color: var(--text-color);
            font-size: 18px;
            margin: 0;
            font-weight: bold;
        }

        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
            width: 24px;
            z-index: 10;
        }

        .content-area {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .input-group {
            display: flex;
            align-items: center;
            position: relative;
        }

        /* مخصوص تراز کردن آدرس به بالا */
        .input-group.textarea-group {
            align-items: flex-start;
        }

        .field-label-icon-wrapper {
            width: 105px;
            height: 40px;
            background-color: var(--field-bg);
            border-radius: 30px;
            display: flex;
            flex-direction: row-reverse;
            /* ✅ آیکون سمت چپ متن */
            align-items: center;
            justify-content: center;
            gap: 5px;
            border: 2px solid transparent;
            transition: border-color 0.3s ease;
        }

        .field-label-icon-wrapper .label {
            font-size: 12px;
            color: var(--text-color);
            font-weight: bold;
        }

        .field-label-icon-wrapper .icon {
            width: 18px;
            height: 18px;
            object-fit: contain;
        }

        .input-wrapper {
            flex-grow: 1;
            margin-right: 10px;
            flex-grow: 1;
            margin-right: 10px;
            /* فاصله بین لیبل و ورودی */
            width: 175px;
            height: 40px;
            border-radius: 30px;
        }

        .input-wrapper input,
        .input-wrapper select {
            width: 175px;
            height: 40px;
            padding: 0 15px;
            border-radius: 30px;
            border: 2px solid transparent;
            background-color: var(--field-bg);
            font-size: 14px;
            box-sizing: border-box;
            text-align: right;
        }

        .input-wrapper textarea {
            width: 175px;
            height: 120px;
            padding: 10px 15px;
            border-radius: 30px;
            border: 2px solid transparent;
            background-color: var(--field-bg);
            font-size: 14px;
            box-sizing: border-box;
            text-align: right;
            resize: none;
            font-family: inherit;
        }

        /* استایل خطا */
        .input-group.error .field-label-icon-wrapper,
        .input-group.error input,
        .input-group.error select,
        .input-group.error textarea {
            border-color: var(--error-border-color);
        }

        .error-message {
            color: var(--error-border-color);
            font-size: 11px;
            display: none;
            text-align: right;
            padding-right: 115px;
            /* تنظیم زیر اینپوت */
            margin-top: -5px;
            margin-bottom: 5px;
        }

        .input-group.error + .error-message {
            display: block;
        }

        .submit-btn {
            background-color: var(--button-bg);
            color: var(--field-bg);
            border: none;
            width: 262px;
            height: 49px;
            border-radius: 30px;
            font-size: 20px;
            cursor: pointer;
            margin: 20px auto 40px auto;
            font-weight: bold;
        }
    </style>
</head>

<body>
<form action="{{ route('order.store') }}" method="post" class="order-details-container">
    @csrf
    <div class="header">
        <img src="{{ asset('/icons & images/Arrow - Left 2.png') }}" alt="Back" class="back-btn"/>
        <h1>جزئیات سفارش</h1>
    </div>

    <div class="content-area">
        <!-- Name -->
        <div class="input-group" id="name-group">
            <div class="field-label-icon-wrapper">
                <img src="{{ asset('/icons & images/Profile.png') }}" class="icon"/>
                <span class="label">نام</span>
            </div>
            <div class="input-wrapper">
                <input name="firstname" value="{{ old('firstname',$user->firstname) }}" type="text" id="name"
                       placeholder="نام"/>
            </div>
        </div>
        @error('firstname')
        <div class="error-message">{{ $message }}</div>
        @enderror
        <!-- Family -->
        <div class="input-group" id="family-group">
            <div class="field-label-icon-wrapper">
                <img src="{{ asset('/icons & images/Profile.png') }}" class="icon"/>
                <span class="label">نام خانوادگی</span>
            </div>
            <div class="input-wrapper">
                <input name="lastname" value="{{ old('lastname',$user->lastname) }}" type="text" id="family-name"
                       placeholder="نام خانوادگی"/>
            </div>
        </div>
        @error('lastname')
        <div class="error-message">{{ $message }}</div>
        @enderror

        <!-- Phone -->
        <div class="input-group" id="phone-group">
            <div class="field-label-icon-wrapper">
                <img src="{{ asset('/icons & images/Call.png') }}" class="icon"/>
                <span class="label">شماره تماس</span>
            </div>
            <div class="input-wrapper">
                <input name="phone" value="{{ old('phone',$user->phone) }}" type="tel" id="phone"
                       placeholder="+۹۸۹XXXXXXXXX"/>
            </div>
        </div>
        @error('phone')
        <div class="error-message">{{ $message }}</div>
        @enderror

        <!-- Province -->
        <div class="input-group" id="province-group">
            <div class="field-label-icon-wrapper">
                <img src="{{ asset('/icons & images/Location.png') }}" class="icon"/>
                <span class="label">استان</span>
            </div>
            <div class="input-wrapper">
                <select name="province" id="province" onchange="updateCities()"
                        data-selected="{{ old('province',$user->address?->province) }}">
                    <option value="">انتخاب استان</option>
                </select>
            </div>
        </div>
        @error('province')
        <div class="error-message">{{ $message }}</div>
        @enderror

        <!-- City -->
        <div class="input-group" id="city-group">
            <div class="field-label-icon-wrapper">
                <img src="{{ asset('/icons & images/Location.png') }}" class="icon"/>
                <span class="label">شهر</span>
            </div>
            <div class="input-wrapper">
                <select name="city" id="city" data-selected="{{ old('city',$user->address?->city) }}">
                    <option value="">انتخاب شهر</option>
                </select>
            </div>
        </div>
        @error('city')
        <div class="error-message">{{ $message }}</div>
        @enderror

        <!-- Address -->
        <div class="input-group textarea-group" id="address-group">
            <div class="field-label-icon-wrapper">
                <img src="{{ asset('/icons & images/Location.png') }}" class="icon"/>
                <span class="label">آدرس</span>
            </div>
            <div class="input-wrapper">
                <textarea name="address" id="address"
                          placeholder="جزئیات آدرس...">{{ old('address',$user->address?->address) }}</textarea>
            </div>
        </div>
        @error('address')
        <div class="error-message">{{ $message }}</div>
        @enderror
    </div>

    <button class="submit-btn">ثبت سفارش</button>
</form>

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

    const provinceSelect = document.getElementById('province')
    const citySelect = document.getElementById('city')

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
