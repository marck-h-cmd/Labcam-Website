<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            // return redirect()->route('dashboard')->with('success', 'Sesión iniciada correctamente')
            $user = Auth::user();
            if (!$user->is_approved) {
                Auth::logout();
                return back()->withErrors(['email' => 'Tu cuenta aún no ha sido aprobada por un administrador.'])->withInput();
            }


            return redirect()->route('admin-principal')->with('success', 'Sesión iniciada correctamente');
        }

        return back()->withErrors(['email' => 'Las credenciales no coinciden'])->withInput();
    }


    public function logout()
    {
        Auth::logout();
    
        // return redirect()->route('login')->with('success', 'Sesión cerrada correctamente');
        return view('usuario.auth.logout');
    }
}
