<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Slider;
use App\Models\AreaProyecto;
use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class PestañaHomeController extends Controller
{

    // VISTA ADMIN
    public function vista_slider_admin()
    {
        $sliderAdmin = Slider::first();
        return view('administrador.home.homeSlider', compact('sliderAdmin'));
    }

    public function update_slider_admin(Request $request)
    {
        // Obtener el primer slider (o el específico que deseas actualizar)
        $slider = Slider::first();

        // Verificar si el slider existe
        if ($slider) {
            // Ruta donde se guardarán las imágenes
            $imagePath = public_path('/user/template/images/carrusel/');

            // Manejar la actualización de cada imagen
            if ($request->hasFile('img1')) {
                // Eliminar la imagen anterior si existe
                if (File::exists($imagePath . $slider->img1)) {
                    File::delete($imagePath . $slider->img1);
                }

                // Obtener la nueva imagen y moverla a la carpeta
                $image1 = $request->file('img1');
                $image1Name = 'carrusel_01_' . Str::random(10) . '.' . $image1->getClientOriginalExtension();
                $image1->move($imagePath, $image1Name);

                // Actualizar el atributo de la base de datos con el nuevo nombre
                $slider->img1 = $image1Name;
            }

            if ($request->hasFile('img2')) {
                // Eliminar la imagen anterior si existe
                if (File::exists($imagePath . $slider->img2)) {
                    File::delete($imagePath . $slider->img2);
                }

                // Obtener la nueva imagen y moverla a la carpeta
                $image2 = $request->file('img2');
                $image2Name = 'carrusel_02_' . Str::random(10) . '.' . $image2->getClientOriginalExtension();
                $image2->move($imagePath, $image2Name);

                // Actualizar el atributo de la base de datos con el nuevo nombre
                $slider->img2 = $image2Name;
            }

            if ($request->hasFile('img3')) {
                // Eliminar la imagen anterior si existe
                if (File::exists($imagePath . $slider->img3)) {
                    File::delete($imagePath . $slider->img3);
                }

                // Obtener la nueva imagen y moverla a la carpeta
                $image3 = $request->file('img3');
                $image3Name = 'carrusel_03_' . Str::random(10) . '.' . $image3->getClientOriginalExtension();
                $image3->move($imagePath, $image3Name);

                // Actualizar el atributo de la base de datos con el nuevo nombre
                $slider->img3 = $image3Name;
            }

            // Guardar los cambios en la base de datos
            $slider->save();
        }

        // Establecer un mensaje de éxito en la sesión
        session()->flash('message', '¡Imágenes actualizadas correctamente!');

        // Redirigir a la página principal con un mensaje de éxito
        return redirect()->route('admin-homeSlider');
    }

   // VISTA USUARIO
    public function vista_home_user()
    {
        $slider = Slider::first();
        $areaProyectos = AreaProyecto::All();
        $noticias = Noticia::orderBy('fecha', 'desc')->take(3)->get();
        $eventos = Evento::orderBy('fecha', 'desc')->take(3)->get();
        return view('usuario.index', compact('slider', 'areaProyectos', 'noticias', 'eventos'));
    }
}
