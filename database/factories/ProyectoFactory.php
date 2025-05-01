<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo'=> fake()->sentence(),
            'subtitulo'=> fake()->sentence(),
            'descripcion'=>  fake()->paragraph(),
            'autor'=> Str::random(10),
            'fecha_publicacion' => fake()->dateTimeThisMonth(),
            'imagen'=>'user/proyectos/top_proyecto_01_P9lUTQLr4t.avif',
            'area_id'=>'7', 
        ];
    }
}
