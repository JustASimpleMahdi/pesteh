<?php

namespace App\Models;

use App\Enums\ProductCodeEnum;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'quantity', 'price', 'code'])]
class Product extends Model
{
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
