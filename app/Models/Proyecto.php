<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'subtitulo', 'descripcion', 'autor', 'fecha_publicacion', 'imagen', 'idAreaProyecto'];

    // Relación con AreaProyecto
    public function areaProyecto()
    {
        return $this->belongsTo(AreaProyecto::class, 'idAreaProyecto', 'id');
    }
}
