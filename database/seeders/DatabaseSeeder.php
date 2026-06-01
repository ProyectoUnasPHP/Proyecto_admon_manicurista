<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert(['name' => 'Admin', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]);
        DB::table('roles')->insert(['name' => 'Trabajadora', 'guard_name' => 'web', 'created_at' => now(), 'updated_at' => now()]);

        $adminUser = User::create([
            'name' => 'Juan Admin',
            'email' => 'admin@spa.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
