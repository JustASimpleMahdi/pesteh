<?php

namespace Database\Seeders;

use App\Enums\SettingsKeyEnum;
use App\Models\Settings;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Settings::create([
            'key' => SettingsKeyEnum::SHIPPING_COST,
            'name' => 'هزینه حمل و نقل',
            'value' => 100_000,
            'type' => 'integer'
        ]);
    }
}
