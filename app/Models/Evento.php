<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evento extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'titulo',
        'subtitulo',
        'descripcion',
        'autor',
        'fecha',
        'imagen',
        'categoria',
    ];

}
