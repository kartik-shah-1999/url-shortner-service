<?php

namespace Database\Seeders;

use App\Models\UserRoles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserRoles::insert([
            ['id' => 1, 'role' => 'superadmin'],
            ['id' => 2, 'role' => 'admin'],
            ['id' => 3, 'role' => 'member']
        ]);
    }
}
