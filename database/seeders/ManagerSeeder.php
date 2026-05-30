<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'کوروش',
            'lastname' => 'خالقی',
            'username' => 'admin',
            'password' => '12345678',
            'phone' => '09354887011',
            'is_manager' => true,
        ]);
    }
}
