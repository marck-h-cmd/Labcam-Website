<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {

        $proyectos = Proyecto::paginate(6);
        return view('usuario.Investigacion.proyectos', compact('proyectos'));
    }

    public function show($id)
    {

        $proyecto = Proyecto::findOrFail($id);

        return view('usuario.Investigacion.detalle-proyectos', compact('proyecto'));

    }
}
