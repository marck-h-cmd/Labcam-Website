<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Topico extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];
    protected $table = 'topicos';

    public function papers()
    {
        return $this->belongsToMany(Paper::class, 'paper_topico');
    }
}
