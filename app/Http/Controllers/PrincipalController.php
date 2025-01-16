<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    // VISTA ADMIN
    public function vista_principal_admin()
    {
        return view('administrador.general.principal');
    }
}
