<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $table = 'sliders'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria
    protected $fillable = ['img1', 'img2', 'img3'];
}

