<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRoleSeeder extends Seeder
{
    public function run(): void
    {
        UserRole::firstOrCreate(
            ['role_name' => 'admin'],
            []
        );
    }
}
