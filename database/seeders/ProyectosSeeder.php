<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class ProyectosSeeder extends Seeder
{
    public function run()
    {
        Proyecto::create([
            'titulo' => 'TITULO de Proyecto1',
            'subtitulo' => 'Subtitulo de Proyecto1',
            'descripcion' => str_repeat('HOLA', 100),
            'imagen' => 'imagenes/proyecto_01.jpg',
            'autor' => 'Autor de Proyecto1',
            'fecha_publicacion' => '2025-01-14',
        ]);

        Proyecto::create([
            'titulo' => 'TITULO de Proyecto2',
            'subtitulo' => 'Subtitulo de Proyecto2',
            'descripcion' => str_repeat('HOLA', 100),
            'imagen' => 'imagenes/proyecto_01.jpg',
            'autor' => 'Autor de Proyecto2',
            'fecha_publicacion' => '2025-01-14',
        ]);

        Proyecto::create([
            'titulo' => 'TITULO de Proyecto3',
            'subtitulo' => 'Subtitulo de Proyecto3',
            'descripcion' => str_repeat('HOLA', 100),
            'imagen' => 'imagenes/proyecto_01.jpg',
            'autor' => 'Autor de Proyecto3',
            'fecha_publicacion' => '2025-01-14',
        ]);

        Proyecto::create([
            'titulo' => 'TITULO de Proyecto4',
            'subtitulo' => 'Subtitulo de Proyecto4',
            'descripcion' => str_repeat('HOLA', 100),
            'imagen' => 'imagenes/proyecto_01.jpg',
            'autor' => 'Autor de Proyecto4',
            'fecha_publicacion' => '2025-01-14',
        ]);

        Proyecto::create([
            'titulo' => 'TITULO de Proyecto5',
            'subtitulo' => 'Subtitulo de Proyecto5',
            'descripcion' => str_repeat('HOLA', 100),
            'imagen' => 'imagenes/proyecto_01.jpg',
            'autor' => 'Autor de Proyecto5',
            'fecha_publicacion' => '2025-01-14',
        ]);

        Proyecto::create([
            'titulo' => 'TITULO de Proyecto6',
            'subtitulo' => 'Subtitulo de Proyecto6',
            'descripcion' => str_repeat('HOLA', 100),
            'imagen' => 'imagenes/proyecto_01.jpg',
            'autor' => 'Autor de Proyecto6',
            'fecha_publicacion' => '2025-01-14',
        ]);

        Proyecto::create([
            'titulo' => 'TITULO de Proyecto7',
            'subtitulo' => 'Subtitulo de Proyecto7',
            'descripcion' => str_repeat('HOLA', 100),
            'imagen' => 'imagenes/proyecto_01.jpg',
            'autor' => 'Autor de Proyecto7',
            'fecha_publicacion' => '2025-01-14',
        ]);
    }
}
