<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaSlider extends Model
{
    use HasFactory;

    protected $table = 'historia_sliders'; 
    protected $primaryKey = 'id'; 
    protected $fillable = ['historia_img', 'descripcion'];
}
