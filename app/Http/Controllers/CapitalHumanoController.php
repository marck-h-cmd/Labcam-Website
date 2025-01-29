<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capital;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use App\Models\AreaInvestigacion;

class CapitalHumanoController extends Controller
{
    //área de administrador
    public function index(Request $request)
    {
        // $buscarPor = $request->input('buscarpor');
        // $resultados = resultado::where('nombre', 'LIKE', "%".$buscarPor."%")->get();

        $capitales = Capital::paginate(8);
        $areasInvestigacion = AreaInvestigacion::All();
        return view('administrador.organizacion.capital_humano.index_capital', compact('capitales' ,'areasInvestigacion'))
               ->with('i', ($request->input('buscarpor', 1) - 1) * $capitales->perPage());
    }

    // public function create()
    // {
    //     // Se trae las áreas de investigación
    //     $areasInvestigacion = AreaInvestigacion::all();
    //     return view('administrador.organizacion.capital_humano.create', compact('areasInvestigacion'));
    // }


    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:255',
            'carrera' => 'required|string|max:255',
            'area_investigacion' => 'required|exists:areas_investigacion,id',
            'correo' => 'required|email|max:255',
            'cv' => 'required|file|mimes:pdf|max:10248',
            'rol' => 'required|string|max:50',
            'imagen' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
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


        Capital::create([
            'nombre' => $request->nombres,
            'carrera' => $request->carrera,
            'area_investigacion' => $request->area_investigacion,
            'correo' => $request->correo,
            'cv' => $cv1Name,
            'foto' => $image1Name,
            'rol' => $request->rol,
            'linkedin' =>$request->linkedin,
            'ctivitae' =>$request->ctivitae
        ]);

            //error en ruta
        return redirect()->route('capital_index')->with('success', 'Registro creado con éxito.');
    }

    // public function edit($id)
    // {
    //     $capital = Capital::findOrFail($id);
    //     return view('administrador.organizacion.capital_humano.edit', compact('capital'));
    // }

    public function update(Request $request, $id)
    {

        $capital = Capital::findOrFail($id);

        // Ruta donde se guardarán las imágenes
        $cvPath = public_path('/user/template/uploads/pdfs');
        // Manejar la actualización de cada imagen
        if ($request->hasFile('edit_cv')) {
            // Obtener la nueva imagen y moverla a la carpeta
            $cv1 = $request->file('edit_cv');
            $cv1Name = 'cvs' . Str::random(10) . '.' . $cv1->getClientOriginalExtension();
            $cv1->move($cvPath, $cv1Name);
        }
        else{
            $cv1Name = $capital->cv;
        }

        $capital->nombre = $request ->edit_nombre;
        $capital->carrera = $request ->edit_carrera;
        $capital->area_investigacion = $request->edit_area_investigacion;
        $capital->cv = $cv1Name;
        $capital->correo = $request ->edit_correo;
        $capital->rol = $request->edit_rol;
        $capital->linkedin = $request->edit_linkedin;
        $capital->ctivitae = $request->edit_ctivitae;
        $capital->save();

        return redirect()->route('capital_index')->with('success', 'Registro actualizado!');
    }



    public function destroy($id)
    {
        $capitales = Capital::findOrFail($id);
        $capitales -> delete();
        //error de ruta
        return redirect()->route('capital_index')->with('success', 'Registro eliminado con éxito.');
    }


    // área de usuario
    public function capHumano_us()
    {
        $investigadores = Capital::where('rol','investigadores')->get();
        $tesistas_pre = Capital::where('rol','tesistas pregrado')->get();
        $tesistas_pos = Capital::where('rol','tesistas posgrado')->get();
        $egresados = Capital::where('rol','egresados')->get();
        $pasantes = Capital::where('rol','pasantes')->get();
        $aliados = Capital::where('rol','aliados')->get();

        return view('usuario.Organizacion.CapitalHumano', compact('investigadores','tesistas_pre','tesistas_pos','egresados','pasantes','aliados'));
    }

    public function direc_us()
    {
        $direccion = Direccion::All();
        return view('usuario.Organizacion.Direccion',compact('direccion'));
    }

}
