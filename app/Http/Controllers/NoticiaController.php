<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;


class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $noticias = Noticia::orderBy('fecha', 'desc')->paginate(6);
        return view('usuario.novedades.noticias', compact('noticias'));
    }

    public function showNoticia(Request $request)
    {
        $query = $request->input('search'); // Obtener el término de búsqueda

        $notici = Noticia::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('titulo', 'like', '%' . $query . '%')
                ->orWhere('autor', 'like', '%' . $query . '%');
        })
            ->orderBy('fecha', 'desc') // Ordena por fecha descendente
            ->paginate(10);

        return view('administrador.panel.novedades.noticia.show', compact('notici'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            //
            $messages = [
                'titulo.required' => 'El campo título es obligatorio.',
                'titulo.string' => 'El título debe ser una cadena de texto.',
                'titulo.max' => 'El título no debe exceder los 255 caracteres.',
                'subtitulo.required' => 'El campo subtítulo es obligatorio.',
                'subtitulo.string' => 'El subtítulo debe ser una cadena de texto.',
                'subtitulo.max' => 'El subtítulo no debe exceder los 1000 caracteres.',
                'contenido.required' => 'El campo contenido es obligatorio.',
                'autor.required' => 'El campo autor es obligatorio.',
                'autor.string' => 'El autor debe ser una cadena de texto.',
                'autor.max' => 'El nombre del autor no debe exceder los 255 caracteres.',
                'fecha.required' => 'El campo fecha es obligatorio.',
                'fecha.date' => 'El campo fecha debe ser una fecha válida.',
                'imagen.image' => 'El archivo debe ser una imagen.',
                'imagen.max' => 'La imagen no debe exceder los 4MB.',
                'imagen.mimes' => 'La imagen debe ser de tipo JPG, PNG o JPEG.',
            ];

            $request->validate([
                'titulo' => 'required|string|max:255',
                'subtitulo' => 'required|string|max:1000',
                'contenido' => 'required',
                'autor' => 'required|string|max:255',
                'fecha' => 'required|date',
                'imagen' => 'nullable|image|max:4096|mimes:jpg,png,jpeg',
            ], $messages);

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
        } catch (ValidationException $e) {
            $errorMessage = implode('<br>', $e->validator->errors()->all());
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage);
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Error: ' . 'Hubo un error. Porfavor, pruebe denuevo');
        }

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
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_titulo' => 'required|string|max:255',
            'edit_subtitulo' => 'required|string|max:1000',
            'edit_contenido' => 'required',
            'edit_autor' => 'required|string|max:255',
            'edit_fecha' => 'required|date',
            'edit_imagen' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);

        $noticia = Noticia::findOrFail($id);

        // Actualizar la imagen si se sube una nueva
        if ($request->hasFile('edit_imagen')) {
            $imagenPath = $request->file('edit_imagen')->store('noticias', 'public');
            $noticia->imagen = $imagenPath;
        }

        // Actualizar los demás campos
        $noticia->update([
            'titulo'    => $request->edit_titulo,
            'subtitulo' => $request->edit_subtitulo,
            'contenido' => $request->edit_contenido,
            'autor'     => $request->edit_autor,
            'fecha'     => $request->edit_fecha,
        ]);

        return redirect()->route('notici')->with('edit', 'Noticia actualizada con éxito');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $noticia = Noticia::findOrFail($id);
        $noticia->delete();

        return redirect()->route('notici')->with('destroy', 'Noticia eliminada con éxito');
    }
}
