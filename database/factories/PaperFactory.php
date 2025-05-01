<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paper>
 */
class PaperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(),
            'autores' => Str::random(10),
            'area_id'=>'7',
            'publisher' => Str::random(8),
            'descripcion' =>  fake()->paragraph(),
            'doi' => Str::random(15),
            'fecha_publicacion' => fake()->dateTimeThisMonth(),
            'pdf_filename' => Str::random(20),
            'img_filename'=> Str::random(20),
        ];
    }
}
