<?php

namespace App\Models;

use App\Enums\ProductCodeEnum;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'quantity', 'price', 'code'])]
class Product extends Model
{
    public function casts(): array
    {
        return [
            'code' => ProductCodeEnum::class,
            'price' => 'integer',
            'quantity' => 'float'
        ];
    }
}
