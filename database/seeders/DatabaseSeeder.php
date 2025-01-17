<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener todos los seeders en database/seeders
        $seeders = collect(File::files(__DIR__))
            ->map(fn ($file) => pathinfo($file, PATHINFO_FILENAME))
            ->filter(fn ($class) => $class !== 'DatabaseSeeder') // Evitar recursión
            ->toArray();

        // Ejecutar cada seeder automáticamente
        foreach ($seeders as $seeder) {
            $this->call("Database\\Seeders\\$seeder");
        }
    }
}