<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use App\Models\AreaProyecto;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

class ProyectoController extends Controller
{
    public function index()
    {

        $proyectos = Proyecto::orderBy('fecha_publicacion', 'desc')->paginate(6);
        return view('usuario.novedades.proyectos', compact('proyectos'));
    }

    public function showProyecto(Request $request)
    {
        $query = $request->input('search'); // Obtener el término de búsqueda

        $proyect = Proyecto::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('titulo', 'like', '%' . $query . '%')
<<<<<<< HEAD
                ->orWhere('autor', 'like', '%' . $query . '%');
        })
            ->orderBy('fecha_publicacion', 'desc') // Ordena por fecha descendente
            ->paginate(10);
=======
                         ->orWhere('autor', 'like', '%' . $query . '%');
        })->paginate(10);
        $areas = AreaProyecto::all();
>>>>>>> f54af44 (add)

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
<<<<<<< HEAD
        //
=======
>>>>>>> f54af44 (add)
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
<<<<<<< HEAD
=======
                'idAreaProyecto.required' => 'Debe seleccionar un área de proyecto.',
                'idAreaProyecto.exists' => 'El área de proyecto seleccionada no es válida.',
>>>>>>> f54af44 (add)
            ];

            $request->validate([
                'titulo' => 'required|string|max:255',
                'subtitulo' => 'required|string|max:1000',
                'descripcion' => 'required',
                'autor' => 'required|string|max:255',
                'fecha_publicacion' => 'required|date',
                'imagen' => 'nullable|image|max:4096|mimes:jpg,png,jpeg',
<<<<<<< HEAD
=======
                'idAreaProyecto' => 'required|exists:areas_proyectos,id', // Validar existencia
>>>>>>> f54af44 (add)
            ], $messages);

            $rutaImagen = null;
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
<<<<<<< HEAD
                $rutaImagen = $imagen->store('proyectos', 'public'); // Guardar imagen en el directorio public
=======
                $rutaImagen = $imagen->store('proyectos', 'public'); // Guardar imagen en storage/app/public/proyectos
>>>>>>> f54af44 (add)
            }

            Proyecto::create([
                'titulo' => $request->titulo,
                'subtitulo' => $request->subtitulo,
                'descripcion' => $request->descripcion,
                'autor' => $request->autor,
                'fecha_publicacion' => $request->fecha_publicacion,
                'imagen' => $rutaImagen,
<<<<<<< HEAD
=======
                'idAreaProyecto' => $request->idAreaProyecto, // Asignar el área de proyecto
>>>>>>> f54af44 (add)
            ]);

            return redirect()->route('proyect')->with('success', 'Proyecto creado con éxito');
        } catch (ValidationException $e) {
            $errorMessage = implode('<br>', $e->validator->errors()->all());
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage);
        } catch (Exception $e) {
<<<<<<< HEAD

            return redirect()->back()->with('error', 'Error: ' . 'Hubo un error. Porfavor, pruebe denuevo');
        }
=======
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
>>>>>>> f54af44 (add)
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_titulo' => 'required|string|max:255',
            'edit_subtitulo' => 'required|string|max:1000',
            'edit_descripcion' => 'required',
            'edit_autor' => 'required|string|max:255',
            'edit_fecha_publicacion' => 'required|date',
            'edit_imagen' => 'nullable|image|mimes:jpg,png',
        ]);

        $proyecto = Proyecto::findOrFail($id);

        // Actualizar la imagen si se sube una nueva
        if ($request->hasFile('edit_imagen')) {
            $imagenPath = $request->file('edit_imagen')->store('proyectos', 'public');
            $proyecto->imagen = $imagenPath;
        }

        $proyecto->update([
            'titulo' => $request->edit_titulo,
            'subtitulo' => $request->edit_subtitulo,
            'descripcion' => $request->edit_descripcion,
            'autor' => $request->edit_autor,
            'fecha_publicacion' => $request->edit_fecha_publicacion,
        ]);

        return redirect()->route('proyect')->with('edit', 'Proyecto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $proyecto = Proyecto::findOrFail($id);
        $proyecto->delete();

        return redirect()->route('proyect')->with('destroy', 'Proyecto eliminado con éxito');
    }
}
