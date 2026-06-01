<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manicurista extends Model
{
    protected $table = 'manicuristas';
    protected $fillable = ['id_usuario', 'especialidad', 'telefono', 'activo'];
    protected $casts = ['activo' => 'boolean'];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function disponibilidades(): HasMany
    {
        return $this->hasMany(Disponibilidad::class, 'id_manicurista');
    }
}
