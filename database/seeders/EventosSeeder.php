<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;

class EventosSeeder extends Seeder
{
    public function run()
    {
        Evento::create([
            'titulo' => 'TITULO de Evento1',
            'subtitulo' => 'Subtitulo de Evento1',
            'descripcion' => str_repeat('HOLA', 100),
            'autor' => 'Autor de Evento1',
            'fecha' => '2025-01-15',
            'imagen' => 'images/evento_01.jpg',
            'categoria' => 'pasado',
        ]);

        Evento::create([
            'titulo' => 'TITULO de Evento2',
            'subtitulo' => 'Subtitulo de Evento2',
            'descripcion' => str_repeat('HOLA', 100),
            'autor' => 'Autor de Evento2',
            'fecha' => '2024-12-02',
            'imagen' => 'images/evento_01.jpg',
            'categoria' => 'pasado',
        ]);

        Evento::create([
            'titulo' => 'TITULO de Evento3',
            'subtitulo' => 'Subtitulo de Evento3',
            'descripcion' => str_repeat('HOLA', 100),
            'autor' => 'Autor de Evento3',
            'fecha' => '2025-01-31',
            'imagen' => 'images/evento_01.jpg',
            'categoria' => 'futuro',
        ]);

        Evento::create([
            'titulo' => 'TITULO de Evento4',
            'subtitulo' => 'Subtitulo de Evento4',
            'descripcion' => str_repeat('HOLA', 100),
            'autor' => 'Autor de Evento4',
            'fecha' => '2025-01-25',
            'imagen' => 'images/evento_01.jpg',
            'categoria' => 'futuro',
        ]);
    }
}

