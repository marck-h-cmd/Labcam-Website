<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaProyecto extends Model
{
    use HasFactory;

    protected $table = 'areas_proyectos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nombreArea'];

    // Relación con Proyecto
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'idAreaProyecto', 'id');
    }
}
