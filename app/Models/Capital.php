<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    use HasFactory;
    protected $table = 'capital';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'carrera',
        'area_investigacion',
        'correo',
        'cv',
        'foto',
        'rol',
    ];

    /**
     * Relación con el modelo AreaInvestigacion.
     * Un capital pertenece a un área de investigación.
     */
    public function areaInvestigacion()
    {
        return $this->belongsTo(AreaInvestigacion::class, 'area_investigacion');
    }
}

