<?php

namespace App\Models;

use App\Casts\JalaliCast;
use App\Enums\OrderStatusEnum;
use App\Enums\SettingsKeyEnum;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

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

    protected function totalItemsPrice(): Attribute
    {
        return Attribute::make(get: fn() => $this->items->sum('price'));
    }

    protected function totalPrice(): Attribute
    {
        return Attribute::make(get: fn() => $this->total_items_price + $this->shipping_cost);
    }
}
