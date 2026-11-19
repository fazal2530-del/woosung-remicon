<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@woosung-remicon.kr'],
            [
                'name' => '관리자',
                'email' => 'admin@woosung-remicon.kr',
                'password' => Hash::make('admin1234'),
                'role' => 'super_admin',
                'locale' => 'ko',
            ]
        );
    }
}
