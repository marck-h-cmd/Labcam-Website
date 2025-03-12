<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaProyecto extends Model
{
    use HasFactory;

    protected $table = 'areas_proyectos'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria
    public $timestamps = false;
    protected $fillable = ['nombreArea'];
}
