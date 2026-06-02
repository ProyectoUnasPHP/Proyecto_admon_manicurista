<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User; // Importamos el modelo oficial

class Manicurista extends Model
{
    protected $table = 'manicuristas';
    protected $fillable = ['id_usuario', 'especialidad', 'telefono', 'activo'];
    protected $casts = ['activo' => 'boolean'];

    // Mantenemos el nombre del método 'usuario' para no dañar tus vistas
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function disponibilidades(): HasMany
    {
        return $this->hasMany(Disponibilidad::class, 'id_manicurista');
    }
}
