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
        return view('usuario.novedades.noticias', compact('noticias'));
    }

    public function showNoticia(Request $request)
    {
        $query = $request->input('search'); // Obtener el término de búsqueda

        $notici = Noticia::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('titulo', 'like', '%' . $query . '%')
                         ->orWhere('autor', 'like', '%' . $query . '%');
        })->paginate(10);

        return view('administrador.panel.novedades.noticia.show', compact('notici'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('notici.create');
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
            'imagen' => 'nullable|image|max:4096|mimes:jpg,png,jpeg',
        ]);

        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('imagenes', 'public'); // Guardar imagen en el directorio public
        }


        Noticia::create([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'contenido' => $request->contenido,
            'autor' => $request->autor,
            'fecha' => $request->fecha,
            'imagen' => $rutaImagen,
        ]);

        return redirect()->route('notici')->with('success', 'Noticia creada con éxito');
    //usuario.Investigacion.noticias
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $noticia = Noticia::findOrFail($id);
        return view('usuario.novedades.detalle-noticias', compact('noticia'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $notici = Noticia::findOrFail($id);
        return view('administrador.panel.novedades.noticia.edit', compact('notici'));
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
            'imagen' => 'nullable|image|mimes:jpg,png',
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

        return redirect()->route('notici')->with('success', 'Noticia actualizada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return redirect()->route('notici')->with('success', 'Noticia eliminada con éxito');
    }


}
