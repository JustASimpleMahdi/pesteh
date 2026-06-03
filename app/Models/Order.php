<?php

namespace App\Models;

use App\Casts\JalaliCast;
use App\Enums\OrderStatusEnum;
use App\Enums\PaymentStatusEnum;
use App\Enums\SettingsKeyEnum;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Morilog\Jalali\Jalalian;

#[Fillable('status')]
class Order extends Model
{
    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            $order->shipping_cost = Settings::get(SettingsKeyEnum::SHIPPING_COST);
            $order->code = static::generateUniqueCode();
        });
    }

    protected static function generateUniqueCode(): string
    {
        $hash = base_convert(now()->timestamp, 10, 36); // Convert to base36

        do {
            $code = 'ORD-' . strtoupper($hash . Str::random(2));
        } while (self::where('code', $code)->exists());

        return $code;
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function receiver(): HasOne
    {
        return $this->hasOne(OrderReceiver::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'status' => OrderStatusEnum::class,
            'created_at' => JalaliCast::class,
            'updated_at' => JalaliCast::class,
        ];
    }

    public function calculateTotalItemsPrice(): int
    {
        return $this->items->sum('price');
    }

    public function calculateTotalPrice(): int
    {
        return $this->calculateTotalItemsPrice() + $this->shipping_cost;
    }

    #[Scope]
    protected function yearly($query)
    {
        $startOfYear = Jalalian::now()->getFirstDayOfYear()->toCarbon();
        $endOfYear = Jalalian::now()->getEndDayOfYear()->toCarbon();
        return $query->whereBetween('created_at', [$startOfYear, $endOfYear]);
    }

    #[Scope]
    protected function monthly($query)
    {
        $startOfMonth = Jalalian::now()->getFirstDayOfMonth()->toCarbon();
        $endOfMonth = Jalalian::now()->getEndDayOfMonth()->toCarbon();
        return $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
    }

    #[Scope]
    protected function daily($query)
    {
        $startOfDay = now()->startOfDay();
        $endOfDay = now()->endOfDay();
        return $query->whereBetween('created_at', [$startOfDay, $endOfDay]);
    }

    #[Scope]
    protected function paid($query)
    {
        return $query->whereHas('payment', function ($query) {
            $query->where('status', PaymentStatusEnum::SUCCESS);
        });
    }
}
