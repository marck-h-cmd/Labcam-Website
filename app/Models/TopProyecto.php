<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopProyecto extends Model
{
    use HasFactory;

    protected $table = 'top_proyectos'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria
    protected $fillable = ['img1', 'img2', 'descripcion'];
}
