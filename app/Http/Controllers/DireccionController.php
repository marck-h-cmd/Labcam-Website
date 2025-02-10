<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Direccion;
use Illuminate\Support\Facades\File;
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
            'descripcion' => 'required',
            'cv' => 'required|file|mimes:pdf|max:10248',
            'linkedin' => 'required|string',
            'ctivitae' => 'required|string'

        ]);

            // Ruta donde se guardarán las imágenes
            $cvPath = public_path('/user/template/uploads/pdfs');
            // Manejar la actualización de cada imagen
            if ($request->hasFile('cv')) {
                // Obtener la nueva imagen y moverla a la carpeta
                $cv1 = $request->file('cv');
                $cv1Name = 'cvs' . Str::random(10) . '.' . $cv1->getClientOriginalExtension();
                $cv1->move($cvPath, $cv1Name);
            }
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
            'cv' => $cv1Name,
            'linkedin' =>$request->linkedin,
            'ctivitae' =>$request->ctivitae
        ]);

            //error en ruta
        return redirect()->route('direccion_index')->with('success', 'Registro creado con éxito.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $direccion = Direccion::findOrFail($id);

        // Ruta donde se guardarán laos cv's
        $cvPath = public_path('/user/template/uploads/pdfs');
        // Manejar la actualización de cada imagen
        if ($request->hasFile('edit_cv')) {
            // Obtener la nueva imagen y moverla a la carpeta
            $cv1 = $request->file('edit_cv');
            $cv1Name = 'cvs' . Str::random(10) . '.' . $cv1->getClientOriginalExtension();
            $cv1->move($cvPath, $cv1Name);
        }
        else{
            $cv1Name = $direccion->cv;
        }

        // Ruta donde se guardarán las imágenes
        $imagePath = public_path('/user/template/images/');
        // Manejar la actualización de cada imagen
        if ($request->hasFile('edit_img')) {
            // Obtener la nueva imagen y moverla a la carpeta
            $foto1 = $request->file('edit_img');
            $image1Name = 'img' . Str::random(10) . '.' . $foto1->getClientOriginalExtension();
            $foto1->move($imagePath, $image1Name);
        }else{
            $image1Name = $direccion->foto;
        }


        $direccion->nombre = $request ->edit_nombre;
        $direccion->carrera = $request ->edit_carrera;
        $direccion->foto = $image1Name;
        $direccion->rol = $request->edit_rol;
        $direccion->cv = $cv1Name;
        $direccion->linkedin = $request ->edit_linkedin;
        $direccion->ctivitae = $request-> edit_ctivitae;
        $direccion->descripcion = $request ->edit_descripcion;
        $direccion->save();

        return redirect()->route('direccion_index')->with('success', 'Registro actualizado!');
    }


    //Usuario
    public function direc_us(){
        $jefes = Direccion::where('rol', 'Jefe')->get();
        $tecnicos = Direccion::where('rol', 'Tecnico')->get();
        $invPs = Direccion::where('rol', 'Investigador Principal')->get();

        return view('usuario.Organizacion.Direccion', compact('jefes', 'tecnicos', 'invPs'));
    }


}
