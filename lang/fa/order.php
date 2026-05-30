<?php

use App\Enums\OrderStatusEnum;
use App\Enums\PaymentStatusEnum;

return [
    'status' => [
        OrderStatusEnum::PENDING->value => 'در حال پردازش',
        OrderStatusEnum::FAILED->value => 'ناموفق',
        OrderStatusEnum::PAYMENT_PENDING->value => 'در انتظار پرداخت',
        OrderStatusEnum::CONFIRMED->value => 'تایید شده'
    ],
    'payment' => [
        'status' => [
            PaymentStatusEnum::PENDING->value => 'در حال پردازش',
            PaymentStatusEnum::SUCCESS->value => 'موفق',
            PaymentStatusEnum::FAIL->value => 'ناموفق'
        ]
    ],
    'manager' => [
        'status' => [
            OrderStatusEnum::PENDING->value => 'در انتظار تایید',
            OrderStatusEnum::FAILED->value => 'ناموفق',
            OrderStatusEnum::PAYMENT_PENDING->value => 'در انتظار پرداخت',
            OrderStatusEnum::CONFIRMED->value => 'تایید شده',
        ],
    ]
];
