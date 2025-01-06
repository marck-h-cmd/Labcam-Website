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
    public function index()
    {
        // inicializar 


        $sliders = HistoriaSlider::all();


        return view('usuario.nosotros.historia', compact('sliders'));
    }




    public function store(Request $request)
    {

        try {

            $request->validate([
                'descripcion' => 'required',
                'historia_img' => 'required|file|mimes:jpeg,png,jpg|max:5120',
            ]);


            $img_name = null;

            if ($request->hasFile('historia_img')) {
                $img = $request->file('historia_img');
                $img_name = Str::uuid() . '.' . $img->getClientOriginalName();
                Storage::disk('imgs')->putFileAs('', $img, $img_name);
            }

            $slider = HistoriaSlider::create([
                'descripcion' => $request->descripcion,
                'historia_img' => $img_name,
            ]);

            Log::info("Stored successfully", ['slider' => $slider]);

            return redirect()->route('h-slider.create')
                ->with('success', 'Creado exitosamente.');
        } catch (Exception $e) {
            Log::error("Error: " . $e->getMessage());

            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

    }

    public function create()
    {
        return view('administrador.panel.historia-slider.create-slider');
    }

    public function edit($id)
    {
        $slider = HistoriaSlider::find($id);

        if (!$slider) {
            return redirect()->route('slider-panel')
                ->with('error', 'No encontrado');
        }

        return view('administrador.panel.paper.edit', compact('slider'));
    }


}

