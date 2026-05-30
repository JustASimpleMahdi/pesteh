<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=360, initial-scale=1.0"/>
    <title>لیست فروش | Pistachio</title>
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
            font-family: "iranFont";
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

        /* ===== هدر ===== */
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

        /* ===== نوار سبز ===== */
        .sub-header-green {
            width: 100%;
            height: 60px;
            background-color: #6D710D;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: #D0D2A1;
            font-size: 19px;
            font-weight: bold;
        }

        .sub-header-green .back-btn {
            position: absolute;
            left: 15px;
        }

        .sub-header-green .back-btn img {
            width: 20px;
        }

        /* ===== بخش اصلی ===== */
        .main-panel-box {
            width: 359px;
            height: 506px;
            margin: 15px auto;
            margin-top: 0;
            border: 1px solid #D1D1D1;
            border-radius: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }

        /* نوار سرچ */
        .search-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #EAEAEA;
            border-radius: 10px;
            padding: 5px 10px;
            width: 300px;
            height: 35px;
            margin-bottom: 10px;
        }

        .search-bar input {
            border: none;
            background: transparent;
            width: 100%;
            font-family: 'IranSans';
            font-size: 13px;
        }

        .search-bar button {
            all: unset;
        }

        .search-bar img {
            width: 20px;
            cursor: pointer;
        }

        /* عنوان */
        .panel-title-text {
            color: #6D710D;
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 8px;
            text-align: right;
            width: 90%;
        }

        /* جدول */
        .sales-table {
            width: 95%;
            border-collapse: collapse;
            font-size: 13px;
            text-align: center;
            color: #000;
        }

        .sales-table th {
            background: #f6f6f6;
            color: #6D710D;
            border-bottom: 1px solid #6D710D;
            padding: 6px 4px;
        }

        .sales-table td {
            border-bottom: 1px solid #ccc;
            padding: 6px 3px;
        }

        .sales-table a {
            color: #333;
            text-decoration: none;
        }

        .sales-table a:hover {
            color: #6D710D;
            text-decoration: underline;
        }

        /* آیکون وضعیت (دیگر استفاده نمی‌شود، ولی برای حفظ ساختار کلی CSS نگه داشته شد) */
        .status-icon {
            width: 22px;
            cursor: pointer;
        }

        /* دکمه ثبت (حذف شد) */
        .submit-btn {
            width: 220px;
            height: 50px;
            margin-top: 150px;
            background-color: #6D710D;
            border: none;
            border-radius: 25px;
            color: #D0D2A1;
            font-family: 'IranSans';
            font-size: 16px;
            cursor: pointer;
        }

        /* ===== فوتر ===== */
        .footer-container {
            width: 100%;
            height: 160px;
            position: absolute;
            bottom: 0;
            border-top: 1px solid #E0E0E0;
            display: flex;
            padding: 15px;
            justify-content: space-between;
        }

        .footer-left-socials {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-left-socials img {
            width: 26px;
            cursor: pointer;
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
        لیست فروش
        <a href="{{ route('manager') }}" class="back-btn"><img src="/icons & images/Arrow - Left 2.png" alt="Back"></a>
    </div>

    <!-- بخش اصلی -->
    <div class="main-panel-box">
        <form action="" class="search-bar">
            <input name="s" value="{{ request('s') }}" type="text" id="searchInput"
                   placeholder="دنبال سفارش خاصی می‌گردید؟">
            <button><img src="/icons & images/Search.png" alt="Search"></button>
        </form>

        <div class="panel-title-text">مدیریت فروش</div>

        <table class="sales-table" id="salesTable">
            <thead>
            <tr>
                <th>ردیف</th>
                <th>نام مشتری</th>
                <th>کد سفارش</th>
                <th>تاریخ</th>
                <th>وضعیت</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                        <a href="{{ route('manager.orders.show',['order' => $order]) }}">{{ $order->receiver->fullname }}</a>
                    </td>
                    <td>{{ $order->code }}</td>
                    <td>{{ $order->created_at->format('Y/m/d') }}</td>
                    <td>{{ __('order.manager.status.'.$order->status->value) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- دکمه ثبت طبق درخواست حذف شد -->
    </div>

    <!-- فوتر -->
    <footer class="footer-container">
        <!-- اطلاعات تماس سمت راست -->
        <div class="footer-right-contact">
            <div class="contact-item">
                <img src="/icons & images/Message.png" alt="Email">
                <span>peste.sh@gmail.com :ایمیل</span>
            </div>
            <div class="contact-item">
                <img src="/icons & images/Location.png" alt="Loc">
                <span>آدرس: کیلومتر ۲۰ بجنورد</span>
            </div>
            <div class="contact-item">
                <img src="/icons & images/Call.png" alt="Phone">
                <span>تلفن: ۰۵۸۳۳۲۴۱۵۶</span>
            </div>
        </div>

        <div class="footer-left-socials">
            <img src="/icons & images/Instagram.png">
            <img src="/icons & images/Telegram.png">
            <img src="/icons & images/Enamad.png">
            <img src="/icons & images/Youtube.png">
        </div>
    </footer>
</div>

<script>
    /* جستجو */
    function searchOrder() {
        const query = document.getElementById("searchInput").value.trim();
        const rows = document.querySelectorAll("#salesTable tbody tr");
        rows.forEach(r => {
            const code = r.cells[2].innerText;
            r.style.display = code.includes(query) ? "" : "none";
        });
    }
</script>

</body>

</html>
