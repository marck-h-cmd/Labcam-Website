<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patente extends Model
{
    /** @use HasFactory<\Database\Factories\PatenteFactory> */
    use HasFactory;
    protected $table = 'patentes'; // Nombre de la tabla
    protected $primaryKey = 'id';
    protected $fillable = ['titulo', 'autores', 'descripcion', 'area_id','fecha_publicacion','pdf_filename','doi','img_filename'];

      public function area()
    {
        return $this->belongsTo(AreaInvestigacion::class, 'area_id');
    }
}
