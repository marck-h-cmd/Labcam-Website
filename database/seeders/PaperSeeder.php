<?php

namespace Database\Seeders;
use App\Models\Paper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paper::factory(3)->create([
            'pdf_filename' => 'sample_pdf.pdf', 
            'img_filename' => 'imagen.png',
            'doi'=>'10.1109/INTERCON52678.2021.9532881'

        ]);
    }
}
