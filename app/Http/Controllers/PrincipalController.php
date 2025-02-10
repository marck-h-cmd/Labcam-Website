<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrincipalController extends Controller
{
    // VISTA ADMIN
    public function vista_principal_admin()
    {
        return view('administrador.general.principal');
    }

    public function vista_admin()
    {
        $user = Auth::user(); 
        return view('administrador.general.principal', compact('user')); // Envía los datos del usuario a la vista
    }
}
