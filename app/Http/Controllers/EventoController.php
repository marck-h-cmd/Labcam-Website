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
            $category = $request->get('category', 'todo'); // Valor predeterminado: 'todo'

            // Filtrar eventos según la categoría
            $query = Evento::query();

            if ($category === 'pasado') {
                $query->where('fecha', '<', Carbon::now());
            } elseif ($category === 'futuro') {
                $query->where('fecha', '>=', Carbon::now());
            }

    // Filtrar por mes y año
            $eventos = $query->whereMonth('fecha', $month)
                             ->whereYear('fecha', $year)
                             ->orderBy('fecha', 'desc')
                             ->paginate(6);
    // Pasar los parámetros a la vista para mostrarlos y poder usarlos en los enlaces
        return view('usuario.novedades.eventos', compact('eventos', 'month', 'year', 'category'));
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('usuario.crear-evento');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'subtitulo' => 'required|string|max:1000',
            'descripcion' => 'required|string',
            'autor' => 'required|string|max:255',
            'fecha' => 'required|date',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'categoria' => 'required|string|max:50',
        ]);

        $path = $request->file('imagen') ? $request->file('imagen')->store('eventos') : null;

        Evento::create([
            'titulo' => $request->titulo,
            'subtitulo' => $request->subtitulo,
            'descripcion' => $request->descripcion,
            'autor' => $request->autor,
            'fecha' => $request->fecha,
            'imagen' => $path,
            'categoria' => $request->categoria,
        ]);

        return redirect()->route('eventos.index')->with('success', 'Evento creado con éxito.');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
