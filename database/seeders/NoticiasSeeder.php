<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Noticia;

class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Noticia::create([
            'titulo' => 'TITULO de Noticia1',
            'subtitulo' => 'Subtitulo de Noticia1',
            'contenido' => str_repeat('HOLA', 100),
            'autor' => 'Autor de Noticia1',
            'fecha' => '2025-01-14',
            'imagen' => 'imagenes/proyecto_01.jpg',
        ]);

        Noticia::create([
            'titulo' => 'TITULO de Noticia2',
            'subtitulo' => 'Subtitulo de Noticia2',
            'contenido' => str_repeat('HOLA', 100),
            'autor' => 'Autor de Noticia2',
            'fecha' => '2025-01-14',
            'imagen' => 'imagenes/proyecto_01.jpg',
        ]);

        Noticia::create([
            'titulo' => 'TITULO de Noticia3',
            'subtitulo' => 'Subtitulo de Noticia3',
            'contenido' => str_repeat('HOLA', 100),
            'autor' => 'Autor de Noticia3',
            'fecha' => '2025-01-14',
            'imagen' => 'imagenes/proyecto_01.jpg',
        ]);

        Noticia::create([
            'titulo' => 'TITULO de Noticia4',
            'subtitulo' => 'Subtitulo de Noticia4',
            'contenido' => str_repeat('HOLA', 100),
            'autor' => 'Autor de Noticia4',
            'fecha' => '2025-01-14',
            'imagen' => 'imagenes/proyecto_01.jpg',
        ]);

        Noticia::create([
            'titulo' => 'TITULO de Noticia5',
            'subtitulo' => 'Subtitulo de Noticia5',
            'contenido' => str_repeat('HOLA', 100),
            'autor' => 'Autor de Noticia5',
            'fecha' => '2025-01-14',
            'imagen' => 'imagenes/proyecto_01.jpg',
        ]);

        Noticia::create([
            'titulo' => 'TITULO de Noticia6',
            'subtitulo' => 'Subtitulo de Noticia6',
            'contenido' => str_repeat('HOLA', 100),
            'autor' => 'Autor de Noticia6',
            'fecha' => '2025-01-14',
            'imagen' => 'imagenes/proyecto_01.jpg',
        ]);
    }
}

