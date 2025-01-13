<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class AreaInvestigacion extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function papers()
    {
        return $this->hasMany(Paper::class, 'area_id');
    }
}
