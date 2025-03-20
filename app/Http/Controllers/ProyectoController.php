<?php

namespace App\Http\Controllers;
use App\Models\AreaProyecto;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;


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
        $areas = AreaProyecto::all();

        return view('administrador.panel.novedades.proyecto.show', compact('proyect','areas'));
    }

    public function show($id)
    {

        $proyecto = Proyecto::findOrFail($id);

        return view('usuario.novedades.detalle-proyectos', compact('proyecto'));


    }
    
    public function showProyectosByArea($idArea)
    {
        $proyectos = Proyecto::where('idAreaProyecto', $idArea)->paginate(10);
        $area = AreaProyecto::findOrFail($idArea);
        return view('usuario.novedades.proyectos', compact('proyectos','area'));
    }



    public function store(Request $request)
    {
        try {
            $messages = [
                'titulo.required' => 'El campo título es obligatorio.',
                'titulo.string' => 'El título debe ser una cadena de texto.',
                'titulo.max' => 'El título no debe exceder los 255 caracteres.',
                'subtitulo.required' => 'El campo subtítulo es obligatorio.',
                'subtitulo.string' => 'El subtítulo debe ser una cadena de texto.',
                'subtitulo.max' => 'El subtítulo no debe exceder los 1000 caracteres.',
                'descripcion.required' => 'El campo descripción es obligatorio.',
                'autor.required' => 'El campo autor es obligatorio.',
                'autor.string' => 'El autor debe ser una cadena de texto.',
                'autor.max' => 'El nombre del autor no debe exceder los 255 caracteres.',
                'fecha_publicacion.required' => 'El campo fecha de publicación es obligatorio.',
                'fecha_publicacion.date' => 'El campo fecha de publicación debe ser una fecha válida.',
                'imagen.image' => 'El archivo debe ser una imagen.',
                'imagen.max' => 'La imagen no debe exceder los 4MB.',
                'imagen.mimes' => 'La imagen debe ser de tipo JPG, PNG o JPEG.',
            ];

            $request->validate([
                'titulo' => 'required|string|max:255',
                'subtitulo' => 'required|string|max:1000',
                'descripcion' => 'required',
                'autor' => 'required|string|max:255',
                'fecha_publicacion' => 'required|date',
                'imagen' => 'nullable|image|max:4096|mimes:jpg,png,jpeg',
            ], $messages);

            $rutaImagen = null;
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $rutaImagen = $imagen->store('proyectos', 'public'); // Guardar imagen en storage/app/public/proyectos
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
        } catch (ValidationException $e) {
            $errorMessage = implode('<br>', $e->validator->errors()->all());
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: Hubo un error. Por favor, pruebe de nuevo.');
        }
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
