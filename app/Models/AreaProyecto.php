<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaProyecto extends Model
{
    use HasFactory;

    protected $table = 'areas_proyectos'; // Ajusta si tu tabla tiene otro nombre
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['nombreArea', 'imagen'];

    /**
     * Relación: Un área tiene muchos proyectos
     */
    public function proyectos()
    {
        return $this->hasMany(Proyecto::class, 'area_id');
    }
}