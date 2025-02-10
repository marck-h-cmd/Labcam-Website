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
            'nombre' => 'Nombres',
            'carrera' => 'Grado Academico',   
            'rol' => 'Jefe', 
            'foto' => 'juan_perez.jpg',
            'descripcion' => str_repeat('dess', 100),
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe',
            'cv' => 'cv_juan_perez.pdf',
        ]);

        Direccion::create([
            'nombre' => 'Nombres',
            'carrera' => 'Grado Academico',   
            'rol' => 'Técnico', 
            'foto' => 'Nombreueyr.jpg',
            'descripcion' => str_repeat('dess', 100),
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe',
            'cv' => 'jdjdjff.pdf',
        ]);

        Direccion::create([
            'nombre' => 'Nombres',
            'carrera' => 'Grado Academico',   
            'rol' => 'Investigador Principal', 
            'foto' => 'Nombreueyr.jpg',
            'descripcion' => str_repeat('dess', 100),
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe',
            'cv' => 'jdjdjff.pdf',
        ]);
    }
}
