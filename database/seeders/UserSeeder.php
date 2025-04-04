<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'email'    => 'superadmin@admin.com',
            'password' => 'password',
        ])->syncRoles(RolesEnum::SUPER_ADMIN->value);

        User::factory()->create([
            'email'    => 'admin@admin.com',
            'password' => 'password',
        ]);

        User::factory()->create([
            'email'    => 'user@user.com',
            'password' => 'password',
        ]);
    }
}
