<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaInvestigacion;
use Illuminate\Support\Facades\Log;
use Exception;

class AreaInvestigacionController extends Controller
{
    public function index(Request $request)
    {


        $areas = AreaInvestigacion::paginate(10);


        return view('administrador.panel.categoria-investigacion.area-panel-tab', compact('areas'))->with('i', ($request->input('page', 1) - 1) * $areas->perPage());
    }

    public function store(Request $request)
    {

        try {
            // validar campos
            $request->validate([
                'nombre' => 'required|string|max:70',

            ]);

            $area = AreaInvestigacion::create($request->all());

            Log::info("Stored successfully", ['area' => $area]);

            return redirect()->route('areas-panel')
                ->with('success', 'Nueva Area de Investigación creado exitosamente.');
        } catch (Exception $e) {
            Log::error("Error storing: " . $e->getMessage());

            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }

    }

    public function update(Request $request, $id)
    {
        try {
            // validar campos
            $request->validate([
                'nombre' => 'required|string|max:70',

            ]);
            $area = AreaInvestigacion::find($id);


            $area->update($request->all());
            return redirect()->route('areas-panel')
                ->with('edited', 'Area de Investigación actualizado exitosamente.');
        } catch (Exception $e) {
            Log::error("Error updating: " . $e->getMessage());

            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $area= AreaInvestigacion::find($id);

        if (!$area) {
            return redirect()->route('areas-panel')
                ->with('error', 'No encontrado');
        }


        $area->delete();
        return redirect()->route('areas-panel')
            ->with('success', 'Area de Investigación eliminado exitosamente');
    }

    public function edit($id,Request $request)
    {
        $area= AreaInvestigacion::find($id);

        if (!$area) {
            return redirect()->route('areas-panel')
                ->with('error', 'No encontrado');
        }
        $areas= AreaInvestigacion::where('id', '!=', $id)->paginate(10);

        return view('administrador.panel.categoria-investigacion.area-update', compact('area', 'areas'))->with('i', ($request->input('page', 1) - 1) * $areas->perPage());
    }
   
}
