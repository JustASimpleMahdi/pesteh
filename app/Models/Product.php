<?php

namespace App\Models;

use App\Enums\ProductCodeEnum;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'quantity', 'price', 'code'])]
class Product extends Model
{
    protected static function booted(): void
    {
        static::updated(function (Product $product) {
            if (!$product->wasChanged('quantity')) return;

            $quantity = $product->quantity;
            if ($product->cartItems()->exists()) {
                if ($quantity === 0) {
                    $product->cartItems()->update(['amount' => 0]);
                } else {
                    $product->cartItems()->where('amount', '>', $quantity)
                        ->update(['amount' => $quantity]);
                }
            }
        });
    }

    public function cartItems(): HasMany
    {
        return $this->hasMany(CartItem::class);
    }

    public function casts(): array
    {
        return [
            'code' => ProductCodeEnum::class,
            'price' => 'integer',
            'quantity' => 'float'
        ];
    }
}
