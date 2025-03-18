<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaProyecto extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'areas_proyectos'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria
    public $timestamps = false;
    protected $fillable = ['nombreArea'];
=======
    protected $table = 'areas_proyectos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nombreArea'];

    // Relación con Proyecto
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'idAreaProyecto', 'id');
    }
>>>>>>> f54af44 (add)
}
