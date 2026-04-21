<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $fillable = ['nombre', 'correo', 'password', 'id_rol'];
    protected $hidden = ['password'];

    public function rol(): BelongsTo
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }

    public function manicurista(): HasOne
    {
        return $this->hasOne(Manicurista::class, 'id_usuario');
    }
}
