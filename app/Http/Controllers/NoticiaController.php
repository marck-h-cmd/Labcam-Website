<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::paginate(6);
        return view('usuario.Investigacion.noticias', compact('noticias'));
    }

    public function showNoticia()
    {
        $noticias = Noticia::all(); // Obtener todos los contactos
        $noticias = Noticia::paginate(10);

        // Retornar la vista con los datos
        return view('administrador.panel.novedades.noticia.show', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:1000',
            'contenido' => 'required',
            'autor' => 'required|string|max:255',
            'fecha' => 'required|date',
            'imagen' => 'required|image',
        ]);

        $imagenPath = $request->file('imagen')->store('noticias', 'public');

        Noticia::create([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'contenido' => $request->contenido,
            'autor' => $request->autor,
            'fecha' => $request->fecha,
            'imagen' => $imagenPath,
        ]);

        return redirect()->route('noticias')->with('success', 'Noticia creada con éxito');
    //usuario.Investigacion.noticias
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $noticia = Noticia::findOrFail($id);
        return view('usuario.Investigacion.detalle-noticias', compact('noticia'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $noticia = Noticia::findOrFail($id);
        return view('administrador.panel.novedades.noticia.edit', compact('noticia'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:1000',
            'contenido' => 'required',
            'autor' => 'required|string|max:255',
            'fecha' => 'required|date',
            'imagen' => 'nullable|image',
        ]);

        $noticia = Noticia::findOrFail($id);

        // Actualizar la imagen si se sube una nueva
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('noticias', 'public');
            $noticia->imagen = $imagenPath;
        }

        $noticia->update([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'contenido' => $request->contenido,
            'autor' => $request->autor,
            'fecha' => $request->fecha,
        ]);

        return redirect()->route('noticias')->with('success', 'Noticia actualizada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return redirect()->route('noticias')->with('success', 'Noticia eliminada con éxito');
    }


}
