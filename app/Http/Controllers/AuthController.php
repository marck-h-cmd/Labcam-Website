<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Método para mostrar la vista de contacto
    public function index()
    {
        return view('usuario.auth.login');
    }

    public function showLoginForm()
    {
        return view('usuario.auth.login');
    }

    public function login(Request $request)
    {
        // Lógica para iniciar sesión
    }

    public function showRegisterForm()
    {
        return view('usuario.auth.register');
    }
}
