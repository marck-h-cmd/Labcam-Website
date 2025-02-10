<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SlidersSeeder extends Seeder
{
    public function run(): void
    {
        Slider::create([
            'img1' => 'carrusel_01_TCslUm98P7.jpg',
            'img2' => 'carrusel_02_AyZkfXzhMj.jpg',
            'img3' => 'carrusel_03_fiy7QpT32W.jpg',
        ]);
    }
}
