<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Direccion;

class DireccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Direccion::create([
            'nombre' => 'Juan Centeno',
            'carrera' => 'Ingeniería de Sistemas',   
            'rol' => 'investigadores', 
            'foto' => 'juan_perez.jpg',
            'descripcion' => str_repeat('dess', 100),
        ]);
    }
}
