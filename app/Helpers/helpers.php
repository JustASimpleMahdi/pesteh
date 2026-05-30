<?php

use App\Enums\ProductCodeEnum;

if (!function_exists('fa_digits')) {
    function fa_digits($value)
    {
        $english = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

        return str_replace($english, $persian, $value);
    }
}

if (!function_exists('item_amount')) {
    function item_amount($value)
    {
        $kg = (int)$value;
        $g = ($value - $kg) * 1000;

        $str = [];
        if ($kg) $str[] = "$kg کیلوگرم";
        if ($g) $str[] = "$g گرم";
        return implode(' و ', $str);
    }
}

if (!function_exists('toman')) {
    function toman($value)
    {
        return fa_digits(number_format($value)) . ' تومان';
    }
}

if (!function_exists('product_image_asset')) {
    function product_image_asset($code)
    {
        return match ($code) {
            ProductCodeEnum::akbari_sade => asset('icons & images/product1.png'),
            ProductCodeEnum::kalegoochi_sade => asset('icons & images/product2.png'),
            ProductCodeEnum::akbari_namaki => asset('icons & images/product1.png'),
            ProductCodeEnum::kalegoochi_namaki => asset('icons & images/product2.png')
        };
    }
}
