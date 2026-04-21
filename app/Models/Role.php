<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Esto permite que podamos guardar el nombre del rol ('Admin' o 'Trabajadora')
    protected $fillable = ['name'];

    // Esta es la relación con los usuarios
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
