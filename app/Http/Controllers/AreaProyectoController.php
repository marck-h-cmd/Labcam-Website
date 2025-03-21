<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreaInvestigacion;
use App\Models\AreaProyecto;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;


class AreaProyectoController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search'); // Obtener el término de búsqueda

        $areasProyecto = AreaProyecto::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('nombreArea', 'like', '%' . $query . '%');
        })->paginate(5);

        return view('administrador.areas_proyectos.index', compact('areasProyecto'));
    }
    public function store(Request $request)
    {
        // Validar los campos requeridos
        $request->validate([
            'nombreArea' => 'required|string|max:255',
            'imagen'     => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Ruta donde se guardarán las imágenes (puedes ajustarla a tu estructura)
        $imagePath = public_path('/user/template/images/');

        // Manejar la imagen
        if ($request->hasFile('imagen')) {
            $file   = $request->file('imagen');
            // Generar un nombre aleatorio
            $imgName = 'area_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            // Mover la imagen a la carpeta especificada
            $file->move($imagePath, $imgName);
        }

        // Crear el registro en la base de datos
        AreaProyecto::create([
            'nombreArea' => $request->nombreArea,
            'imagen'     => $imgName ?? null,  // Guardamos el nombre de la imagen
        ]);

        // Redirigir a la vista index con un mensaje de éxito
        return redirect()
            ->route('areas_proyectos_admin') // Ajusta esta ruta a la de tu listado
            ->with('create_success', 'Área de proyecto creada correctamente.');
    }

    public function update(Request $request, AreaProyecto $area)
    {
        // Validar los campos requeridos
        $request->validate([
            'nombreArea' => 'required|string|max:255',
            // La imagen es opcional al editar, por lo que se valida solo si se envía
            'imagen'     => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Ruta donde se guardarán las imágenes (ajústala según tu estructura)
        $imagePath = public_path('/user/template/images/');

        // Actualizar el nombre del área
        $area->nombreArea = $request->nombreArea;

        // Manejar la imagen solo si se sube una nueva
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            // Generar un nombre aleatorio
            $imgName = 'area_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            // Mover la imagen a la carpeta especificada
            $file->move($imagePath, $imgName);
            // Actualizar el campo de la imagen en la base de datos
            $area->imagen = $imgName;
        }

        // Guardar los cambios en la base de datos
        $area->save();

        // Redirigir a la vista index con un mensaje de éxito
        return redirect()
            ->route('areas_proyectos_admin') // Ajusta esta ruta según corresponda
            ->with('create_success', 'Área de proyecto actualizada correctamente.');
    }

    public function destroy($id)
    {
        try {
            // Buscar el área o fallar si no existe
            $area = AreaProyecto::findOrFail($id);

            // Eliminar el registro
            $area->delete();

            // Redirigir con mensaje de éxito
            return redirect()->route('areas_proyectos_admin')
                ->with('destroy', 'Área eliminada correctamente.');
        } catch (Exception $e) {
            // En caso de error, redirigir con mensaje de error
            return redirect()->route('areas_proyectos_admin')
                ->with('destroy', 'Ocurrió un error al eliminar el área.');
        }
    }

    public function edit($id, Request $request)
    {
        $area = AreaInvestigacion::find($id);

        if (!$area) {
            return redirect()->route('areas-panel')
                ->with('error', 'No encontrado');
        }
        $areas = AreaInvestigacion::where('id', '!=', $id)->paginate(10);

        return view('administrador.panel.categoria-investigacion.area-update', compact('area', 'areas'))->with('i', ($request->input('page', 1) - 1) * $areas->perPage());
    }
}
