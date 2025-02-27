<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Exception;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $month = $request->get('month', now()->month);
        $year = $request->get('year', now()->year);
        $category = $request->get('category', 'todo');


        $query = Evento::query();

        if ($category === 'pasado') {
            $query->where('fecha', '<', Carbon::now());
        } elseif ($category === 'futuro') {
            $query->where('fecha', '>=', Carbon::now());
        }


        $eventos = $query->whereMonth('fecha', $month)
            ->whereYear('fecha', $year)
            ->orderBy('fecha', 'desc')
            ->paginate(6);

        return view('usuario.novedades.eventos', compact('eventos', 'month', 'year', 'category'));
    }


    public function showEvento(Request $request)
    {
        $search = $request->input('search');

        $event = Evento::when($search, function ($queryBuilder) use ($search) {
            $queryBuilder->where('titulo', 'like', '%' . $search . '%')
                ->orWhere('autor', 'like', '%' . $search . '%');
        })
            ->orderBy('fecha', 'desc') // Ordena por fecha descendente
            ->paginate(10);

        return view('administrador.panel.novedades.evento.show', compact('event'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $messages = [
                'titulo.required'      => 'El campo título es obligatorio.',
                'titulo.string'        => 'El título debe ser una cadena de texto.',
                'titulo.max'           => 'El título no debe exceder los 255 caracteres.',
                'subtitulo.required'   => 'El campo subtítulo es obligatorio.',
                'subtitulo.string'     => 'El subtítulo debe ser una cadena de texto.',
                'subtitulo.max'        => 'El subtítulo no debe exceder los 1000 caracteres.',
                'descripcion.required' => 'El campo descripción es obligatorio.',
                'autor.required'       => 'El campo autor es obligatorio.',
                'autor.string'         => 'El autor debe ser una cadena de texto.',
                'autor.max'            => 'El nombre del autor no debe exceder los 255 caracteres.',
                'fecha.required'       => 'El campo fecha es obligatorio.',
                'fecha.date'           => 'El campo fecha debe ser una fecha válida.',
                'fecha.after_or_equal' => 'La fecha debe ser igual o posterior a hoy.',
                'imagen.image'         => 'El archivo debe ser una imagen.',
                'imagen.mimes'         => 'La imagen debe ser de tipo JPEG, PNG o JPG.',
                'imagen.max'           => 'La imagen no debe exceder los 2MB.',
            ];

            $request->validate([
                'titulo'      => 'required|string|max:255',
                'subtitulo'   => 'required|string|max:1000',
                'descripcion' => 'required',
                'autor'       => 'required|string|max:255',
                'fecha'       => 'required|date_format:Y-m-d|after_or_equal:' . date('Y-m-d'),
                'imagen'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ], $messages);

            // Se asigna la categoría "futuro" siempre
            $categoria = 'futuro';

            $rutaImagen = null;
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $rutaImagen = $imagen->store('eventos', 'public');
            }

            // Guardar la descripción con todas sus etiquetas HTML
            $descripcion = $request->descripcion;

            Evento::create([
                'titulo'      => $request->titulo,
                'subtitulo'   => $request->subtitulo,
                'descripcion' => $descripcion,
                'autor'       => $request->autor,
                'fecha'       => $request->fecha,
                'categoria'   => $categoria,
                'imagen'      => $rutaImagen,
            ]);

            return redirect()->route('event')->with('success', 'Evento creado con éxito.');
        } catch (ValidationException $e) {
            $errorMessage = implode('<br>', $e->validator->errors()->all());
            return redirect()->back()->withInput()->with('error', $errorMessage);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: Hubo un error. Por favor, pruebe de nuevo');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $evento = Evento::findOrFail($id);
        return view('usuario.novedades.detalle-eventos', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_titulo' => 'required|string|max:255',
            'edit_subtitulo' => 'required|string|max:1000',
            'edit_descripcion' => 'required|string',
            'edit_autor' => 'required|string|max:255',
            'edit_fecha' => 'required|date_format:Y-m-d|after_or_equal:' . date('Y-m-d'),
            'edit_imagen' => 'nullable|image|mimes:jpg,png',
        ]);
    
        $evento = Evento::findOrFail($id);
        $evento->fecha = $request->edit_fecha;
        $evento->categoria = 'futuro';
    
        if ($request->hasFile('edit_imagen')) {
            $imagenPath = $request->file('edit_imagen')->store('eventos', 'public');
            $evento->imagen = $imagenPath;
        }
    
        $evento->update([
            'titulo' => strip_tags($request->edit_titulo),
            'subtitulo' => strip_tags($request->edit_subtitulo),
            'descripcion' => $request->edit_descripcion, // Permite HTML
            'autor' => strip_tags($request->edit_autor),
            'fecha' => $request->edit_fecha,
        ]);
    
        return redirect()->route('event')->with('edit', 'Evento actualizado con éxito');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return redirect()->route('event')->with('destroy', 'Evento eliminado con éxito');
    }
}
