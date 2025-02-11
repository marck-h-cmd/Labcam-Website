<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Capital;

class CapitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $capitalData = [
            ['nombre' => 'Juan Pérez', 
            'carrera' => 'Ingeniería de Sistemas', 
            'area_investigacion' => 1, 
            'correo' => 'juan.perez@correo.com', 
            'cv' => 'cv_juan_perez.pdf', 
            'rol' => 'investigadores', 
            'foto' => 'juan_perez.jpg',
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe'],

            ['nombre' => 'María López', 
            'carrera' => 'Ciencias Biológicas', 
            'area_investigacion' => 2, 
            'correo' => 'maria.lopez@correo.com', 
            'cv' => 'cv_maria_lopez.pdf', 
            'rol' => 'egresados', 
            'foto' => 'maria_lopez.jpg',
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe'],

            ['nombre' => 'Carlos García', 
            'carrera' => 'Ingeniería Química', 
            'area_investigacion' => 3, 
            'correo' => 'carlos.garcia@correo.com', 
            'cv' => 'cv_carlos_garcia.pdf', 
            'rol' => 'tesistas', 
            'foto' => 'carlos_garcia.jpg',
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe'],

            ['nombre' => 'Ana Rodríguez', 
            'carrera' => 'Medicina Humana', 
            'area_investigacion' => 4, 'correo' => 
            'ana.rodriguez@correo.com', 
            'cv' => 'cv_ana_rodriguez.pdf', 
            'rol' => 'pasantes', 
            'foto' => 'ana_rodriguez.jpg',
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe'],

            ['nombre' => 'Luis Martínez', 
            'carrera' => 'Tecnología de Información', 
            'area_investigacion' => 5, 
            'correo' => 'luis.martinez@correo.com', 
            'cv' => 'cv_luis_martinez.pdf', 
            'rol' => 'aliados', 
            'foto' => 'luis_martinez.jpg',
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe'],

            ['nombre' => 'Sofía Gómez', 
            'carrera' => 'Ingeniería Ambiental', 
            'area_investigacion' => 6, 
            'correo' => 'sofia.gomez@correo.com', 
            'cv' => 'cv_sofia_gomez.pdf', 
            'rol' => 'investigadores', 
            'foto' => 'sofia_gomez.jpg',
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe'],

            ['nombre' => 'Miguel Torres', 
            'carrera' => 'Ciencias de la Comunicación', 
            'area_investigacion' => 7, 
            'correo' => 'miguel.torres@correo.com', 
            'cv' => 'cv_miguel_torres.pdf', 
            'rol' => 'egresados', 
            'foto' => 'miguel_torres.jpg',
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe'],
            
            ['nombre' => 'Elena Ruiz', 
            'carrera' => 'Pedagogía', 
            'area_investigacion' => 8,
            'correo' => 'elena.ruiz@correo.com', 
            'cv' => 'cv_elena_ruiz.pdf', 
            'rol' => 'tesistas', 
            'foto' => 'elena_ruiz.jpg',
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe'],

            ['nombre' => 'Roberto Sánchez', 
            'carrera' => 'Economía', 
            'area_investigacion' => 9, 
            'correo' => 'roberto.san@correo.com', 
            'cv' => 'cv_roberto_sanchez.pdf', 
            'rol' => 'pasantes', 
            'foto' => 'roberto_sanchez.jpg',
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe'],

            ['nombre' => 'Claudia Díaz', 
            'carrera' => 'Física', 
            'area_investigacion' => 10, 
            'correo' => 'claudia.diaz@correo.com', 
            'cv' => 'cv_claudia_diaz.pdf', 
            'rol' => 'aliados', 
            'foto' => 'claudia_diaz.jpg',
            'linkedin' => 'llllllajjdjdjdjd.com',
            'ctivitae' => 'trtruiweoaoa.unitru.pe']
        ];

        foreach ($capitalData as $data) {
            Capital::create($data);
        }
    }
}

