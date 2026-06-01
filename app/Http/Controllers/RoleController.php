<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index()
    {
        $roles = DB::table('roles')->get();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permisos = $this->getPermisos();
        return view('roles.create', compact('permisos'));
    }

    public function store(Request $request)
    {
        $request->validate(['nombre_rol' => 'required|string|max:255|unique:roles,name']);
        DB::table('roles')->insert([
            'name' => $request->nombre_rol,
            'guard_name' => 'web',
            'descripcion' => $request->descripcion,
            'permisos' => json_encode($request->permisos ?? []),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente.');
    }

    public function edit($id)
    {
        $role = DB::table('roles')->where('id', $id)->first();
        $permisos = $this->getPermisos();
        $permisosActivos = json_decode($role->permisos ?? '[]', true);
        return view('roles.edit', compact('role', 'permisos', 'permisosActivos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['nombre_rol' => 'required|string|max:255|unique:roles,name,' . $id]);
        DB::table('roles')->where('id', $id)->update([
            'name' => $request->nombre_rol,
            'descripcion' => $request->descripcion,
            'permisos' => json_encode($request->permisos ?? []),
            'updated_at' => now()
        ]);
        return redirect()->route('roles.index')->with('success', 'Rol actualizado.');
    }

    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete();
        return redirect()->route('roles.index')->with('success', 'Rol eliminado.');
    }

    private function getPermisos()
    {
        return [
            'ver_dashboard' => 'Ver Dashboard',
            'ver_servicios' => 'Ver Servicios',
            'crear_servicios' => 'Crear Servicios',
            'editar_servicios' => 'Editar Servicios',
            'eliminar_servicios' => 'Eliminar Servicios',
            'ver_manicuristas' => 'Ver Manicuristas',
            'crear_manicuristas' => 'Crear Manicuristas',
            'editar_manicuristas' => 'Editar Manicuristas',
            'ver_citas' => 'Ver Citas',
            'crear_citas' => 'Crear Citas',
            'ver_clientes' => 'Ver Clientes',
            'ver_roles' => 'Ver Roles',
            'crear_roles' => 'Crear Roles',
            'editar_roles' => 'Editar Roles',
            'eliminar_roles' => 'Eliminar Roles',
        ];
    }
}