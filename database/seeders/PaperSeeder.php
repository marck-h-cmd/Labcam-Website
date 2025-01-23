<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paper;

class PaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paper::create([
            'titulo' => 'The Future of Space Colonization: Challenges and Possibilities',
            'autores' => "[\"Thomas Williams\",\"Sophia Green\"]",
            'publisher' => 'Green',
            'descripcion' => 'An exploration of potential human settlements on Mars, the Moon, and beyond, including technological and ethical considerations.An exploration of potential human settlements on Mars, the Moon, and beyond, including technological and ethical considerations.An exploration of potential human settlements on Mars, the Moon, and beyond, including technological and ethical considerations.',
            'area_id' =>2,
            'doi' => '10.3344/spacecol.2025.039i',
            'fecha_publicacion' => '2025-01-21',
            'pdf_filename' => 'b-b7e8-e5775678fd23.sample-local-pdf.pdf',
            'img_filename' => 'images/noticia_01.jpg',
          ]);

          Paper::create([
            'titulo' => 'AI in Music Composition: Can Machines Be Truly Creative?',
            'autores' => "[\"Matthew Lopez\",\"Christina White\"]",
            'publisher' => 'White',
            'descripcion' => 'An exploration of how AI-powered tools are being used to compose music and whether they can replicate human creativity.',
            'area_id' => 3,
            'doi' => '10.5567/aimusic.2025.035',
            'fecha_publicacion' => '2025-01-20',
            'pdf_filename' => 'b-b7e8-e5775678fd23.sample-local-pdf.pdf',
            'img_filename' => 'images/noticia_01.jpg',
        ]);
    
        Paper::create([
            'titulo' => 'Renewable Energy Storage Solutions: Overcoming the Intermittency Challenge',
            'autores' => "[\"Jason Cooper\",\"Emily Nguyen\"]",
            'publisher' => 'Nguyen',
            'descripcion' => 'A review of advancements in battery storage, hydrogen fuel cells, and other technologies to make renewable energy more reliable.',
            'area_id' => 4,
            'doi' => '10.9900/energystor.2025.037',
            'fecha_publicacion' => '2025-01-19',
            'pdf_filename' => 'b-b7e8-e5775678fd23.sample-local-pdf.pdf',
            'img_filename' => 'images/noticia_01.jpg',
        ]);
    
        Paper::create([
            'titulo' => 'The Sociology of Online Communities and Digital Socialization',
            'autores' => "[\"Rachel Adams\",\"Lucas Moore\"]",
            'publisher' => 'Moore',
            'descripcion' => 'An investigation into how digital communities shape social interactions and collective behavior in the 21st century.',
            'area_id' => 5,
            'doi' => '10.7788/digisoch.2025.036',
            'fecha_publicacion' => '2025-01-18',
            'pdf_filename' => 'b-b7e8-e5775678fd23.sample-local-pdf.pdf',
            'img_filename' => 'images/noticia_01.jpg',
        ]);
    
        Paper::create([
            'titulo' => 'Biodegradable Plastics: A Sustainable Solution to Pollution?',
            'autores' => "[\"Jessica Reed\",\"Ethan Clark\"]",
            'publisher' => 'Clark',
            'descripcion' => 'An evaluation of the effectiveness and environmental impact of biodegradable plastics compared to traditional plastics.',
            'area_id' => 6,
            'doi' => '10.7788/bioplastics.2025.031',
            'fecha_publicacion' => '2025-01-17',
            'pdf_filename' => 'b-b7e8-e5775678fd23.sample-local-pdf.pdf',
            'img_filename' => 'images/noticia_01.jpg',
        ]);
    
        Paper::create([
            'titulo' => 'Smart Agriculture: How IoT is Transforming Farming Practices',
            'autores' => "[\"Jonathan Harris\",\"Emily Scott\"]",
            'publisher' => 'Scott',
            'descripcion' => 'An overview of how Internet of Things (IoT) devices are revolutionizing precision farming, irrigation, and crop monitoring.',
            'area_id' => 7,
            'doi' => '10.1122/smartagri.2025.033',
            'fecha_publicacion' => '2025-01-16',
            'pdf_filename' => 'b-b7e8-e5775678fd23.sample-local-pdf.pdf',
            'img_filename' => 'images/noticia_01.jpg',
        ]);
    
        Paper::create([
            'titulo' => 'Dark Matter and the Expanding Universe: Unsolved Mysteries in Astrophysics',
            'autores' => "[\"James Peterson\",\"Olivia Thompson\"]",
            'publisher' => 'Thompson',
            'descripcion' => 'A review of current theories on dark matter and its role in the accelerated expansion of the universe.',
            'area_id' => 8,
            'doi' => '10.3344/darkmatter.2025.024',
            'fecha_publicacion' => '2025-01-15',
            'pdf_filename' => 'b-b7e8-e5775678fd23.sample-local-pdf.pdf',
            'img_filename' => 'images/noticia_01.jpg',
        ]);
    
        Paper::create([
            'titulo' => 'Mindfulness and Mental Health: The Science Behind Meditation Practices',
            'autores' => "[\"Amanda Stewart\",\"Ryan Bennett\"]",
            'publisher' => 'Bennett',
            'descripcion' => 'An analysis of how mindfulness meditation affects brain activity, stress reduction, and overall mental well-being.',
            'area_id' => 9,
            'doi' => '10.5567/mindhealth.2025.040',
            'fecha_publicacion' => '2025-01-14',
            'pdf_filename' => 'b-b7e8-e5775678fd23.sample-local-pdf.pdf',
            'img_filename' => 'images/noticia_01.jpg',
        ]);
    
        Paper::create([
            'titulo' => 'The Ethics of Artificial General Intelligence: Risks and Benefits',
            'autores' => "[\"Alan Wright\",\"Samantha Cooper\"]",
            'publisher' => 'Cooper',
            'descripcion' => 'A discussion on the potential societal impact of Artificial General Intelligence (AGI) and the ethical considerations of its development.',
            'area_id' => 10,
            'doi' => '10.5678/agiethics.2025.022',
            'fecha_publicacion' => '2025-01-13',
            'pdf_filename' => 'b-b7e8-e5775678fd23.sample-local-pdf.pdf',
            'img_filename' => 'images/noticia_01.jpg',
        ]);
    
        Paper::create([
            'titulo' => 'Autonomous Drones for Disaster Response and Relief Operations',
            'autores' => "[\"Samuel Richards\",\"Anna Kim\"]",
            'publisher' => 'Kim',
            'descripcion' => 'A study on the use of AI-powered drones for search-and-rescue missions and emergency supply delivery in disaster-stricken areas.',
            'area_id' => 11,
            'doi' => '10.7788/droneresponse.2025.026',
            'fecha_publicacion' => '2025-01-12',
            'pdf_filename' => 'b-b7e8-e5775678fd23.sample-local-pdf.pdf',
            'img_filename' => 'images/noticia_01.jpg',
        ]);


    }
}
