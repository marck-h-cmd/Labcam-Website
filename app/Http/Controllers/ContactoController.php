<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    // Método para mostrar la vista de contacto
    public function index()
    {
        return view('usuario.contacto');
    }

    // Método para manejar el envío del formulario (opcional)
    public function enviar(Request $request)
    {
        // Validar y procesar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mensaje' => 'required|string',
        ]);

        // Aquí puedes procesar el mensaje, como enviarlo por correo, guardar en base de datos, etc.

        // Ejemplo de respuesta
        return redirect()->route('contacto')->with('success', 'Mensaje enviado con éxito');
    }
}
