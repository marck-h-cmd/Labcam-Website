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
        $buscarpor = $request->get('buscarpor');
        // Si no se recibe 'role' en la URL, se usa "Investigadores" por defecto.
        $role = $request->get('role', 'Investigadores');

        // Filtra por nombre y rol (se usa LIKE para permitir coincidencias parciales)
        $query = Capital::where('nombre', 'LIKE', "%" . $buscarpor . "%")
            ->where('rol', 'LIKE', '%' . $role . '%');

        // Se fuerza la paginación a 6 registros por página
        $capitales = $query->paginate(5);
        // Conservar todos los parámetros en la paginación
        $capitales->appends($request->all());

        $areasInvestigacion = AreaInvestigacion::all();
        return view(
            'administrador.organizacion.capital_humano.index_capital',
            compact('capitales', 'areasInvestigacion', 'buscarpor', 'role')
        );
    }

    public function store(Request $request)
    {
        // Ruta donde se guardarán las imágenes
        $cvPath = public_path('/user/template/uploads/pdfs');
        if ($request->hasFile('cv')) {
            $cv1 = $request->file('cv');
            $cv1Name = 'cvs' . Str::random(10) . '.' . $cv1->getClientOriginalExtension();
            $cv1->move($cvPath, $cv1Name);
        }

        // Ruta donde se guardarán las imágenes
        $imagePath = public_path('/user/template/images/');
        if ($request->hasFile('imagen')) {
            $foto1 = $request->file('imagen');
            $image1Name = 'img' . Str::random(10) . '.' . $foto1->getClientOriginalExtension();
            $foto1->move($imagePath, $image1Name);
        }

        // Definir rol con tesistas pregrado/posgrado
        if ($request->rol === 'Tesistas') {
            if ($request->tesistas_type == 'Pregrado') {
                $rol_b = 'Tesistas Pregrado';
            } elseif ($request->tesistas_type === 'Posgrado') {
                $rol_b = 'Tesistas Posgrado';
            }
        } else {
            $rol_b = $request->rol;
        }

        // Crear registro
        Capital::create([
            'nombre'            => $request->nombres,
            'carrera'           => $request->carrera,
            'area_investigacion' => $request->area_investigacion,
            'correo'            => $request->correo,
            'cv'                => $cv1Name ?? null,
            'foto'              => $image1Name ?? null,
            'rol'               => $rol_b,
            'linkedin'          => $request->linkedin,
            'ctivitae'          => $request->ctivitae
        ]);

        // Redirige a la página de listado y guarda en sesión el mensaje y el rol registrado
        return redirect()
            ->route('capital_index', ['role' => $rol_b]) // Incluye el rol en la URL
            ->with('create_success', "Nuevo registro en {$rol_b} guardado exitosamente");
    }


    public function update(Request $request, $id)
    {
        $capital = Capital::findOrFail($id);

        // Ruta donde se guardarán los CV's
        $cvPath = public_path('/user/template/uploads/pdfs');
        if ($request->hasFile('edit_cv')) {
            $cv1 = $request->file('edit_cv');
            $cv1Name = 'cvs' . Str::random(10) . '.' . $cv1->getClientOriginalExtension();
            $cv1->move($cvPath, $cv1Name);
        } else {
            $cv1Name = $capital->cv;
        }

        // Ruta donde se guardarán las imágenes
        $imagePath = public_path('/user/template/images/');
        if ($request->hasFile('edit_img')) {
            $foto1 = $request->file('edit_img');
            $image1Name = 'img' . Str::random(10) . '.' . $foto1->getClientOriginalExtension();
            $foto1->move($imagePath, $image1Name);
        } else {
            $image1Name = $capital->foto;
        }

        // Definir rol con tesistas pregrado/posgrado
        if ($request->edit_rol === 'Tesistas') {
            if ($request->edit_tesistas_type == 'Pregrado') {
                $rol_b = 'Tesistas Pregrado';
            } elseif ($request->edit_tesistas_type === 'Posgrado') {
                $rol_b = 'Tesistas Posgrado';
            }
        } else {
            $rol_b = $request->edit_rol;
        }

        // Actualiza los demás campos
        $capital->nombre = $request->edit_nombre;
        $capital->carrera = $request->edit_carrera;
        $capital->area_investigacion = $request->edit_area_investigacion;
        $capital->correo = $request->edit_correo;
        $capital->cv = $cv1Name;
        $capital->foto = $image1Name;
        $capital->rol = $rol_b;
        $capital->linkedin = $request->edit_linkedin;
        $capital->ctivitae = $request->edit_ctivitae;
        $capital->save();

        // Redirige a la página de listado, pasando el rol actualizado y el mensaje de éxito
        return redirect()
            ->route('capital_index', ['role' => $rol_b])
            ->with('update_success', 'Registro actualizado con éxito');
    }




    public function destroy($id)
    {
        $capital = Capital::findOrFail($id);
        // Extraemos el rol del registro; si es "Tesistas Pregrado" o "Tesistas Posgrado", lo normalizamos a "Tesistas"
        $role = $capital->rol;
        if (stripos($role, 'tesistas') !== false) {
            $role = 'Tesistas';
        }
        $capital->delete();

        return redirect()
            ->route('capital_index', ['role' => $role])
            ->with('delete_success', 'Registro eliminado con éxito');
    }

    // área de usuario
    public function capHumano_us()
    {
        $investigadores = Capital::where('rol', 'investigadores')->get();
        $tesistas_pre = Capital::where('rol', 'Tesistas Pregrado')->get();
        $tesistas_pos = Capital::where('rol', 'Tesistas Posgrado')->get();
        $egresados = Capital::where('rol', 'egresados')->get();
        $pasantes = Capital::where('rol', 'pasantes')->get();
        $aliados = Capital::where('rol', 'aliados')->get();

        return view('usuario.Organizacion.CapitalHumano', compact('investigadores', 'tesistas_pre', 'tesistas_pos', 'egresados', 'pasantes', 'aliados'));
    }

    public function area_us()
    {
        $capitales = Capital::All();
        $areasInvestigacion = AreaInvestigacion::All();

        return view('usuario.Organizacion.AreasInvestigacion', compact('capitales', 'areasInvestigacion'));
    }
}
