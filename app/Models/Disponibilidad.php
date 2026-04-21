<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Disponibilidad extends Model
{
    protected $table = 'disponibilidades';
    protected $fillable = ['id_manicurista', 'dia_semana', 'hora_inicio', 'hora_fin'];

    public function manicurista(): BelongsTo
    {
        return $this->belongsTo(Manicurista::class, 'id_manicurista');
    }

    public static function getDiasSemanales()
    {
        return [
            'lunes' => 'Lunes',
            'martes' => 'Martes',
            'miercoles' => 'Miércoles',
            'jueves' => 'Jueves',
            'viernes' => 'Viernes',
            'sabado' => 'Sábado',
            'domingo' => 'Domingo'
        ];
    }
}
