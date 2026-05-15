<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Creamos los roles en la base de datos
        $adminRole = Role::create(['name' => 'Admin']);
        $trabajadoraRole = Role::create(['name' => 'Trabajadora']);

        // 2. Creamos tu usuario administrador de prueba
        $adminUser = User::create([
            'name' => 'Juan Admin',
            'email' => 'admin@spa.com',
            'password' => Hash::make('12345678'),
        ]); // <--- ¡Aquí estaba el detalle! Faltaba cerrar esta línea.

        // 3. Conectamos al usuario con su rol en la tabla intermedia
        $adminUser->roles()->attach($adminRole);
    }
}
