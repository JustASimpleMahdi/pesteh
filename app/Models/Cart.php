<?php

namespace App\Models;

use App\Enums\SettingsKeyEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cart extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    protected function totalItemsPrice(): Attribute
    {
        return Attribute::make(get: fn() => $this->items->sum('price'));
    }

    protected function totalPrice(): Attribute
    {
        return Attribute::make(get: fn() => $this->totalItemsPrice + $this->shippingCost);
    }

    protected function shippingCost(): Attribute
    {
        return Attribute::make(get: fn() => Settings::get(SettingsKeyEnum::SHIPPING_COST));
    }
}
