<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AreaInvestigacion extends Model
{
    use HasFactory;

    protected $table = 'areas_investigacion';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre'];

    public function papers()
    {
        return $this->hasMany(Paper::class, 'area_id');
    }
    
        public function patentes()
    {
        return $this->hasMany(Patente::class, 'area_id');
    }

    /**
     * Relación con el modelo Capital.
     * Un área de investigación tiene muchos capitales.
     */
    public function capitales()
    {
        return $this->hasMany(Capital::class, 'area_investigacion');
    }
}
