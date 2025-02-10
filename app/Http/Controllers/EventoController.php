<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        $query = $request->input('search'); 

        $event = Evento::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('titulo', 'like', '%' . $query . '%')
                         ->orWhere('autor', 'like', '%' . $query . '%');
        })->paginate(10);

        return view('administrador.panel.novedades.evento.show', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
         $categoria = Carbon::now()->isPast() ? 'pasado' : 'futuro';

         return view('usuario.crear-evento', compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:1000',
            'descripcion' => 'required',
            'autor' => 'required|string|max:255',
            'fecha' => 'required|date|after_or_equal:today',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $evento = new Evento;
        $evento->fecha = $request->fecha; 
        $evento->categoria = Carbon::parse($evento->fecha)->isPast() ? 'pasado' : 'futuro';


        $rutaImagen = null;
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $rutaImagen = $imagen->store('eventos', 'public'); 
        }

        $descripcion = strip_tags($request->descripcion, '<p><a><strong><em><ul><ol><li><br><u>');
        $evento->descripcion = $descripcion;

        Evento::create([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'descripcion' => $request->descripcion,
            'autor' => $request->autor,
            'fecha' => $request->fecha,
            'categoria' => Carbon::parse($request->fecha)->isPast() ? 'pasado' : 'futuro',
            'imagen' => $rutaImagen,
        ]);

        return redirect()->route('event')->with('success', 'Evento creado con éxito.');
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $event = Evento::findOrFail($id);
        return view('administrador.panel.novedades.evento.edit', compact('event'));
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
            'fecha' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpg,png',
        ]);


        $evento = Evento::findOrFail($id);
        $evento->fecha = $request->fecha;
        $evento->categoria = Carbon::parse($evento->fecha)->isPast() ? 'pasado' : 'futuro';


        
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('eventos', 'public');
            $evento->imagen = $imagenPath;
        }

        $evento->update([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'descripcion' => $request->descripcion,
            'autor' => $request->autor,
            'fecha' => $request->fecha,
        ]);

        return redirect()->route('event')->with('success', 'Evento actualizada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);
        $evento->delete();

        return redirect()->route('event')->with('success', 'Evento eliminada con éxito');
    }
}
