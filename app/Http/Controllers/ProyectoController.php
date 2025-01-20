<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {

        $proyectos = Proyecto::paginate(6);
        return view('usuario.novedades.proyectos', compact('proyectos'));
    }

    public function show($id)
    {

        $proyecto = Proyecto::findOrFail($id);

        return view('usuario.novedades.detalle-proyectos', compact('proyecto'));

    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:1000',
            'descripcion' => 'required',
            'autor' => 'required|string|max:255',
            'fecha' => 'required|date',
            'imagen' => 'required|image',
        ]);

        $imagenPath = $request->file('imagen')->store('proyectos', 'public');

        Proyecto::create([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'descripcion' => $request->contenido,
            'autor' => $request->autor,
            'fecha' => $request->fecha,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado con éxito');
    }

}
