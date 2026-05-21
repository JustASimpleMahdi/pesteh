<?php

namespace Database\Seeders;

use App\Enums\ProductCodeEnum;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'پسته اکبری ساده',
            'quantity' => 0,
            'price' => 900_000,
            'code' => ProductCodeEnum::akbari_sade
        ]);
        Product::create([
            'name' => 'پسته کله‌قوچی ساده',
            'quantity' => 0,
            'price' => 800_000,
            'code' => ProductCodeEnum::kalegoochi_sade
        ]);
        Product::create([
            'name' => 'پسته اکبری نمکی',
            'quantity' => 0,
            'price' => 850_000,
            'code' => ProductCodeEnum::akbari_namaki
        ]);
        Product::create([
            'name' => 'پسته کله‌قوچی نمکی',
            'quantity' => 0,
            'price' => 950_000,
            'code' => ProductCodeEnum::kalegoochi_namaki
        ]);
    }
}
