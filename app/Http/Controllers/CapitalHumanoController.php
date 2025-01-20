<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CapitalHumanoController extends Controller
{
    public function index()
    {
        return view('administrador.organizacion.capital_humano.index');
    }
}
