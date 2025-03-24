<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'file_paths',
    ];

    protected $casts = [
        'file_paths' => 'array',
    ];
}
