<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nombre_rol', 'descripcion', 'permisos'];

    public function tienePermiso(string $permiso): bool
    {
        $permisos = json_decode($this->permisos ?? '[]', true);
        return in_array($permiso, $permisos);
    }
}
