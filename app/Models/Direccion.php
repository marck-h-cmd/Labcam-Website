<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Direccion extends Model
{
    use HasFactory;
    protected $table = 'direccion';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','carrera','foto','rol','cv','linkedin','ctivitae', 'descripcion'];
}
