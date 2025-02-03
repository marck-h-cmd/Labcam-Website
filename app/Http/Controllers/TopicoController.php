<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topico;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
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

            $messages = [
                'nombre.unique' => 'El nombre ya esta registrado.',
            ];

            // validar campos
            $request->validate([
                'nombre' => 'required|string|max:40',

            ],$messages);



            $topico = Topico::create($request->all());

            Log::info("Stored successfully", ['topico' => $topico]);

            return redirect()->route('topic-panel')
                ->with('success', 'Nuevo Topico creado exitosamente.');
            } catch (ValidationException $e) {
                $errorMessage = implode('<br>', $e->validator->errors()->all());
                return redirect()->back()
                    ->withInput()
                    ->with('error', $errorMessage);
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
            ->with('destroyed', 'Topico eliminado exitosamente');
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
