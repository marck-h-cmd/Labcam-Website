<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AreaInvestigacion;

class AreaInvestigacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = [
            ['nombre' => 'Inteligencia Artificial'],

            ['nombre' => 'Estructuras 2'],

            ['nombre' => 'Sistemas Autonomos'],

            ['nombre' => 'Machine Learning'],

            ['nombre' => 'Deep Learning'],

            ['nombre' => 'Politica Constructiva'],

            ['nombre' => 'IT'],

            ['nombre' => 'Macroeconomia'],

            ['nombre' => 'Contabilidad'],

            ['nombre' => 'Educación']
        ];

        foreach ($areas as $area) {
            AreaInvestigacion::create($area);
        }
    }
}

