<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Sistem',
            'email' => 'admin@example.com',
            'password' => Hash::make('jawa'), // kamu bisa ganti dengan password lain
            'role' => 'admin',
        ]);
    }
}
