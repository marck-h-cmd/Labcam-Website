<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capital;

class CapitalHumanoController extends Controller
{
    public function index(Request $request)
    {
        $capitales = Capital::paginate(8);
        return view('administrador.organizacion.capital_humano.index_capital', compact('capitales'))
               ->with('i', ($request->input('page', 1) - 1) * $capitales->perPage());
    }
    

    public function create()
    {
        return view('capitales.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'carrera' => 'required|string|max:255',
            'area_investigacion' => 'required|exists:areas,id',
            'correo' => 'required|email|max:255',
            'cv' => 'required|file|mimes:pdf|max:2048', // Validar PDF
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar imagen
        ]);
    
        $cvPath = $request->file('cv')->store('cvs', 'public');
        $fotoPath = $request->file('foto')->store('fotos', 'public');
    
        Capital::create([
            'nombres' => $request->nombres,
            'carrera' => $request->carrera,
            'area_investigacion' => $request->area_investigacion,
            'correo' => $request->correo,
            'cv' => $cvPath,
            'foto' => $fotoPath,
        ]);
    
        return redirect()->route('capitales')->with('success', 'Registro creado con éxito.');
    }

    public function update(Request $request, Capital $capital)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'carrera' => 'required|string|max:255',
            'area_investigacion' => 'required|exists:areas,id',
            'correo' => 'required|email|max:255',
            'cv' => 'required|file|mimes:pdf|max:2048',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'rol' => 'required|string|max:255',
        ]);

        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cvs', 'public');
            $capital->cv = $cvPath;
        }

        $capitales->create([
            'nombres' => $request->nombres,
            'carrera' => $request->carrera,
            'area_investigacion' => $request->Area_Investigacion,
            'correo' => $request->correo,
            'cv'=>  $request->cv,
            'foto'=> $request->foto,
            'rol' => $request->rol,
        ]);

        

        return redirect()->route('capitales')->with('success', 'Registro actualizado con éxito.');
    }

    public function destroy($id)
    {
        $capitales = Capital::findOrFail($id);
        $capitales -> delete();
        return redirect()->route('capitales')->with('success', 'Registro eliminado con éxito.');
    }


}
