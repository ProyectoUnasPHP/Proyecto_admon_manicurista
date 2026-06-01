<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Crear los roles iniciales
        $adminRole = Role::create(['name' => 'Admin']);
        $manicuristaRole = Role::create(['name' => 'Manicurista']);

        // 2. Crear permisos básicos para gestionar la seguridad
        $verRoles = Permission::create(['name' => 'ver roles']);
        $crearRoles = Permission::create(['name' => 'crear roles']);
        $editarRoles = Permission::create(['name' => 'editar roles']);
        $eliminarRoles = Permission::create(['name' => 'eliminar roles']);

        // 3. Asignar todos estos permisos al Administrador
        $adminRole->syncPermissions([
            $verRoles,
            $crearRoles,
            $editarRoles,
            $eliminarRoles
        ]);

        // (El rol Manicurista se queda sin estos permisos administrativos)
    }
}
