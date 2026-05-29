<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case PAYMENT_PENDING = "payment-pending";
    case PAYMENT_SUCCESS = "payment-success";
    case PAYMENT_FAIL = "payment-fail";
}
