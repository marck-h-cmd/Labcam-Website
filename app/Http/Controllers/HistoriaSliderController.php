<?php

namespace App\Http\Controllers;
use App\Models\HistoriaSlider;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;
class HistoriaSliderController extends Controller
{
    public function index(Request $request)
    {
        // inicializar 


        $sliders = HistoriaSlider::paginate();


        return view('administrador.panel.h-slider-panel', compact('sliders'))->with('i', ($request->input('page', 1) - 1) * $sliders->perPage());
    }

    public function view(Request $request)
    {
        // inicializar 


        $sliders = HistoriaSlider::all();


        return view('usuario.nosotros.historia', compact('sliders'));
    }




    public function store(Request $request)
    {

        try {
            // validar campos
            $request->validate([
                'descripcion' => 'required',
                'historia_img' => 'required|file|mimes:jpeg,png,jpg|max:5120',
            ]);


            $img_name = null;
            // Guardar la imagen historia con un string aleatorio para almacenarlo en storage/uploads/imgs
            if ($request->hasFile('historia_img')) {
                $img = $request->file('historia_img');
                $img_name = Str::uuid() . '.' . $img->getClientOriginalName();
                Storage::disk('imgs')->putFileAs('', $img, $img_name);
            }

            $slider = HistoriaSlider::create([
                'descripcion' => $request->descripcion,
                'historia_img' => $img_name,
            ]);

            // Logs de comprobación que se guarde correctamente
            Log::info("Stored successfully", ['slider' => $slider]);

            return redirect()->route('h-slider.create')
                ->with('success', 'Creado exitosamente.');
        } catch (Exception $e) {
            Log::error("Error: " . $e->getMessage());

            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

    }

    public function update(Request $request, $id)
    {
        try {
            // validar campos
            $request->validate([
                'descripcion' => '',
                'historia_img' => 'file|mimes:jpeg,png,jpg|max:5120',
            ]);
            $slider = HistoriaSlider::findOrFail($id);


            $historiaImg = $slider->historia_img;



            if ($request->hasFile('historia_img')) {
                // Borrar antigua imagen si existe
                if ($slider->historia_img && Storage::disk('imgs')->exists($historiaImg)) {
                    Storage::disk('imgs')->delete($historiaImg);
                }

                // Remplazar por nueva imagen
                $img = $request->file('historia_img');
                $historiaImg = Str::uuid() . '.' . $img->getClientOriginalExtension();
                Storage::disk('imgs')->putFileAs('', $img, $historiaImg);
            }

            $slider->update([
                'descripcion' => $request->descripcion,
                'historia_img' => $historiaImg,
            ]);



            return redirect()->route('h-sliders-panel')
                ->with('edited', 'Slider actualizado exitosamente.');
        } catch (Exception $e) {
            Log::error("Error updating: " . $e->getMessage());

            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    // Funciones para las views del blade
    public function create()
    {
        return view('administrador.panel.historia-slider.create-slider');
    }

    public function destroy($id)
    {
        $slider = HistoriaSlider::find($id);

        if (!$slider) {
            return redirect()->route('h-sliders-panel')
                ->with('error', 'No encontrado');
        }


        $slider->delete();
        return redirect()->route('h-sliders-panel')
            ->with('success', 'Slider eliminado exitosamente');
    }


    public function edit($id)
    {
        $slider = HistoriaSlider::find($id);

        if (!$slider) {
            return redirect()->route('h-sliders-panel')
                ->with('error', 'No encontrado');
        }

        return view('administrador.panel.historia-slider.edit-slider', compact('slider'));
    }


}

