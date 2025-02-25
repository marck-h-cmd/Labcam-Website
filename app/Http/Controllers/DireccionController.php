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
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $direccion = Direccion::findOrFail($id);

        // Ruta donde se guardarán los CV
        $cvPath = public_path('/user/template/uploads/pdfs');
        if ($request->hasFile('edit_cv')) {
            $cv1 = $request->file('edit_cv');
            $cv1Name = 'cvs' . Str::random(10) . '.' . $cv1->getClientOriginalExtension();
            $cv1->move($cvPath, $cv1Name);
        } else {
            $cv1Name = $direccion->cv;
        }

        // Ruta donde se guardarán las imágenes
        $imagePath = public_path('/user/template/images/');
        if ($request->hasFile('edit_img')) {
            $foto1 = $request->file('edit_img');
            $image1Name = 'img' . Str::random(10) . '.' . $foto1->getClientOriginalExtension();
            $foto1->move($imagePath, $image1Name);
        } else {
            $image1Name = $direccion->foto;
        }

        // Actualiza los campos
        $direccion->nombre      = $request->edit_nombre;
        $direccion->carrera     = $request->edit_carrera;
        $direccion->foto        = $image1Name;
        $direccion->rol         = $request->edit_rol;
        $direccion->cv          = $cv1Name;
        $direccion->linkedin    = $request->edit_linkedin;
        $direccion->ctivitae    = $request->edit_ctivitae;
        $direccion->descripcion = $request->edit_descripcion;
        $direccion->save();

        // Redirige con un mensaje de éxito en la sesión
        return redirect()
            ->route('direccion_index')
            ->with('update_success', 'Registro actualizado exitosamente');
    }

    //Usuario
    public function direc_us()
    {
        $jefes = Direccion::where('rol', 'Jefe')->get();
        $tecnicos = Direccion::where('rol', 'Tecnico')->get();
        $invPs = Direccion::where('rol', 'Investigador Principal')->get();

        return view('usuario.Organizacion.Direccion', compact('jefes', 'tecnicos', 'invPs'));
    }
}
