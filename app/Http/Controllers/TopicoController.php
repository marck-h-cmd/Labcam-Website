<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topico;
use Illuminate\Support\Facades\Log;

use Exception;

class TopicoController extends Controller
{


    public function index(Request $request)
    {


        $topicos = Topico::paginate(10);


        return view('administrador.panel.categoria-investigacion.topico-panel-tab', compact('topicos'))->with('i', ($request->input('page', 1) - 1) * $topicos->perPage());
    }

    public function store(Request $request)
    {

        try {
            // validar campos
            $request->validate([
                'nombre' => 'required|string|max:40',

            ]);



            $topico = Topico::create($request->all());

            Log::info("Stored successfully", ['topico' => $topico]);

            return redirect()->route('topic-panel')
                ->with('success', 'Nuevo Topico creado exitosamente.');
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
                'nombre' => 'required|string|max:40',

            ]);
            $topic = Topico::find($id);


            $topic->update($request->all());
            return redirect()->route('topic-panel')
                ->with('edited', 'Topico actualizado exitosamente.');
        } catch (Exception $e) {
            Log::error("Error updating: " . $e->getMessage());

            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $topico = Topico::find($id);

        if (!$topico) {
            return redirect()->route('topic-panel')
                ->with('error', 'No encontrado');
        }


        $topico->delete();
        return redirect()->route('topic-panel')
            ->with('success', 'Topico eliminado exitosamente');
    }

    public function edit($id,Request $request)
    {
        $topico = Topico::find($id);

        if (!$topico) {
            return redirect()->route('topic-panel')
                ->with('error', 'No encontrado');
        }
        $topicos = Topico::where('id', '!=', $id)->paginate(10);

        return view('administrador.panel.categoria-investigacion.topico-update', compact('topico', 'topicos'))->with('i', ($request->input('page', 1) - 1) * $topicos->perPage());
    }

}
