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

    public function showProyecto(Request $request)
    {
        $query = $request->input('search'); // Obtener el término de búsqueda

        $proyect = Proyecto::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('titulo', 'like', '%' . $query . '%')
                         ->orWhere('autor', 'like', '%' . $query . '%');
        })->paginate(10);

        return view('administrador.panel.novedades.proyecto.show', compact('proyect'));
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
            'fecha_publicacion' => 'required|date',
            'imagen' => 'nullable|image|max:4096|mimes:jpg,png,jpeg',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('proyectos', 'public'); // Guardar imagen en el directorio public
        }

        Proyecto::create([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'descripcion' => $request->descripcion,
            'autor' => $request->autor,
            'fecha_publicacion' => $request->fecha_publicacion,
            'imagen' => $rutaImagen,
        ]);

        return redirect()->route('proyect')->with('success', 'Proyecto creado con éxito');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $proyect = Proyecto::findOrFail($id);
        return view('administrador.panel.novedades.proyecto.edit', compact('proyect'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:1000',
            'descripcion' => 'required',
            'autor' => 'required|string|max:255',
            'fecha_publicacion' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpg,png',
        ]);

        $proyecto = Proyecto::findOrFail($id);

        // Actualizar la imagen si se sube una nueva
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('proyectos', 'public');
            $proyecto->imagen = $imagenPath;
        }

        $proyecto->update([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'descripcion' => $request->descripcion,
            'autor' => $request->autor,
            'fecha_publicacion' => $request->fecha_publicacion,
        ]);

        return redirect()->route('proyect')->with('success', 'Proyecto actualizada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyect')->with('success', 'Proyecto eliminada con éxito');
    }



}
