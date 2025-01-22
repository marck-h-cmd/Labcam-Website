<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TopProyecto;

class TopProyectosSeeder extends Seeder
{
    public function run(): void
    {
        TopProyecto::create([
            'img1' => 'top_proyecto_01_fOp4tGHJPT.jpg',
            'img2' => 'proyecto_02.jpg',
            'descripcion' => '<p style="text-align: justify;">En esta <em><strong>secci&oacute;n</strong></em>, te presentamos una cuidada selecci&oacute;n de proyectos que reflejan nuestra pasi&oacute;n por la innovaci&oacute;n y el compromiso con la excelencia. Cada proyecto ha sido dise&ntilde;ado y ejecutado con un enfoque en la creatividad, funcionalidad y los m&aacute;s altos est&aacute;ndares de calidad. Desde soluciones tecnol&oacute;gicas avanzadas hasta propuestas visuales impactantes, nuestro portafolio representa la diversidad y la capacidad de adaptarnos a las necesidades de nuestros clientes.</p>',
        ]);
    }
}
