<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Direccion>
 */
class DireccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->sentence(),
            'carrera' => Str::random(10),
            'foto' => fake()->dateTimeThisMonth(),
            'rol' => Str::random(20),
            'cv'=> Str::random(20),
            'linkedin'=> Str::random(20),
        ];
    }
}
