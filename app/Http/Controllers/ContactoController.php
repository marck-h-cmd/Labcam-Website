<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contacto;

class ContactoController extends Controller
{
    
    public function index()
    {
        return view('usuario.contacto');

    }

    public function showContacts()
    {
        $contactos = Contacto::all(); 
        $contactos = Contacto::paginate(10);

        
        return view('administrador.panel.contacto.show', compact('contactos'));
    }

   
    public function store(Request $request)
    {
        
        $request->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'correo' => 'required|email|max:255',
            'telefono' => [
            'required',
            'string',
            'max:20',
            'regex:/^\+?[0-9]+$/',
            ],
            'pais' => 'required|string|max:100',
            'departamento' => 'required|string|max:100',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string',
            'archivo' => 'nullable|file|max:4096|mimes:pdf,jpg,png,docx',
            'telefono.regex' => 'El teléfono solo puede contener números y un "+" opcional al inicio.',
        ]);

      
        $rutaArchivo = null;
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->store('archivos', 'public'); 
        }

   
        Contacto::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'pais' => $request->pais,
            'departamento' => $request->departamento,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'archivo' => $rutaArchivo,
        ]);


        Mail::to('ejemplo@gmail.com');
        // ->queue(new MensajeRecibido($mensaje));
        // return view('mensaje.enviado', ['nombre' => $mensaje['nombre']]);
        // return back()->with('nombre', $mensaje['nombre']);
        return redirect()->back()->with('success', 'Mensaje enviado correctamente.');
    }
}
