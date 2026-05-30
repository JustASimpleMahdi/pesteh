<?php

namespace App\Enums;

enum OrderStatusEnum: string
{
    case PAYMENT_PENDING = "payment-pending";
    case PENDING = "pending";
    case FAILED = "failed";
    case CONFIRMED = "confirmed";
}
