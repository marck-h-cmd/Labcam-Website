<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use Illuminate\Support\Str;

class DireccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {


        $direcciones = Direccion::All();
        return view('administrador.organizacion.direccion.index_direccion', compact('direcciones'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'carrera' => 'required|string|max:255',
            'rol' => 'required|string|max:50',
            'imagen' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            'descripcion' => 'required'

        ]);

            // Ruta donde se guardarán las imágenes
            $imagePath = public_path('/user/template/images/');
            // Manejar la actualización de cada imagen
            if ($request->hasFile('imagen')) {
                // Obtener la nueva imagen y moverla a la carpeta
                $foto1 = $request->file('imagen');
                $image1Name = 'img' . Str::random(10) . '.' . $foto1->getClientOriginalExtension();
                $foto1->move($imagePath, $image1Name);
            }


        Direccion::create([
            'nombre' => $request->nombres,
            'carrera' => $request->carrera,
            'foto' => $image1Name,
            'rol' => $request->rol,
            'descripcion' =>$request->descripcion,
        ]);

            //error en ruta
        return redirect()->route('direccion_index')->with('success', 'Registro creado con éxito.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $direccion = Direccion::findOrFail($id);

        // Ruta donde se guardarán las imágenes
        $imagePath = public_path('/user/template/images/');
        // Manejar la actualización de cada imagen
        if ($request->hasFile('edit_img')) {
            // Obtener la nueva imagen y moverla a la carpeta
            $foto1 = $request->file('edit_img');
            $image1Name = 'img' . Str::random(10) . '.' . $foto1->getClientOriginalExtension();
            $foto1->move($imagePath, $image1Name);
        }else{
            $image1Name = $capital->foto;
        }


        $capital->nombre = $request ->edit_nombre;
        $capital->carrera = $request ->edit_carrera;
        $capital->foto = $image1Name;
        $capital->rol = $request->edit_rol;
        $direccion->descripcion = $request ->edit_descripcion;
        $capital->save();

        return redirect()->route('direccion_index')->with('success', 'Registro actualizado!');
    }


    //Usuario
    public function direc_us(){
        $jefe = Direccion::where('rol', 'Jefe')->get();
        $tecnico = Direccion::where('rol', 'Tecnico')->get();
        $invP = Direccion::where('rol', 'Investigador Principal')->get();
        return view('usuario.Organizacion.Direccion', compact('jefe', 'tecnico', 'invP'));
    }


}
