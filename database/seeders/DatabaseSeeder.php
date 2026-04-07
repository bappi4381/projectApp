<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin User
        User::updateOrCreate(
        ['email' => 'admin@pixelforge.com'],
        [
            'name' => 'PixelForge Admin',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]
        );

    }
}
