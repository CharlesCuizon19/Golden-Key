<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Get admin role
        $adminRole = UserRole::where('role_name', 'admin')->first();

        // Create admin user
        User::firstOrCreate(
            ['email' => 'hello@rweb.solutions'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('*'),
                'role_id' => $adminRole->id,
            ]
        );
    }
}
