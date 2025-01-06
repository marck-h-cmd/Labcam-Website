<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    /** @use HasFactory<\Database\Factories\PaperFactory> */
    use HasFactory;
    protected $table = 'papers'; // Nombre de la tabla
    protected $primaryKey = 'id';
    protected $fillable = ['titulo', 'autores', 'publisher','descripcion','area','fecha_publicacion','doi','pdf_filename','img_filename'];
}
