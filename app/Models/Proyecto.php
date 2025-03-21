<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'subtitulo',
        'descripcion',
        'autor',
        'fecha_publicacion',
        'imagen',
        'area_id', // Nuevo campo para la relación con AreaProyecto
    ];

    /**
     * Relación: Un proyecto pertenece a un área
     */
    public function areaProyecto()
    {
        return $this->belongsTo(AreaProyecto::class, 'area_id');
    }
}