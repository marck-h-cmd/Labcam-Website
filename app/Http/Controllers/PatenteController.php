<?php

namespace App\Http\Controllers;

use App\Models\Patente;
use Carbon\Traits\ToStringFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\AreaInvestigacion;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Nette\Schema\Message;
class PatenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patentes = Patente::orderBy('fecha_publicacion', 'desc')->paginate(6);
        return view('usuario.patente.patentes', compact('patentes'));
    }

    public function showPatente(Request $request)
    {
        $query = $request->input('search');

        $patentes = Patente::when($query, function ($queryBuilder) use ($query) {
            $queryBuilder->where('titulo', 'like', '%' . $query . '%')
                ->orWhere('descripcion', 'like', '%' . $query . '%')
                ->orWhere('doi', 'like', '%' . $query . '%');
        })
            ->orderBy('fecha_publicacion', 'desc')
            ->paginate(10);

        $patentes->each(function ($patente) {
            $patente->formatted_autores = $this->formatAutores($patente->autores);
        });
        $areas = AreaInvestigacion::all();


        return view('administrador.panel.patentes.show', compact('patentes', 'areas'));
    }

    public function handleFileSize()
    {
        ini_set('post_max_size', '10M');
        ini_set('upload_max_filesize', '10M');
        ini_set('max_execution_time', '300');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $messages = [
                'titulo.required' => 'El campo título es obligatorio.',
                'titulo.string' => 'El título debe ser una cadena de texto.',
                'titulo.max' => 'El título no debe exceder los 200 caracteres.',
                'autores.required' => 'El campo autores es obligatorio.',
                'descripcion.required' => 'El campo descripción es obligatorio.',
                'fecha_publicacion.required' => 'El campo fecha de publicación es obligatorio.',
                'fecha_publicacion.date' => 'El campo fecha debe ser una fecha válida.',
                'pdf_filename.required' => 'El archivo PDF es obligatorio.',
                'pdf_filename.mimes' => 'El archivo debe ser un PDF.',
                'pdf_filename.max' => 'El PDF no debe exceder los 10MB.',
                'img_filename.image' => 'El archivo debe ser una imagen.',
                'img_filename.max' => 'La imagen no debe exceder los 4MB.',
                'img_filename.mimes' => 'La imagen debe ser de tipo JPG, PNG o JPEG.',
                'doi.string' => 'El DOI debe ser una cadena de texto.',
                'doi.max' => 'El DOI no debe exceder los 100 caracteres.',
            ];

            $validator = Validator::make($request->all(), [
                'titulo' => 'required|string|max:200',
                'autores' => 'required|json',
                'descripcion' => 'required',
                'area_id' => 'required|exists:areas_investigacion,id',
                'fecha_publicacion' => 'required|date',
                'pdf_filename' => 'required|mimes:pdf|max:10240',
                'img_filename' => 'nullable|image|max:4096|mimes:jpg,png,jpeg',
                'doi' => 'nullable|string|max:100',
            ], $messages);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            // Procesar autores (convertir array a JSON)
            $autoresJson = json_encode($request->autores);

            // Guardar el PDF
            $pdf_fileName = null;
            if ($request->hasFile('pdf_filename')) {
                $pdf = $request->file('pdf_filename');
                $pdf_fileName = Str::uuid() . '.' . $pdf->getClientOriginalExtension();
                Storage::disk('pdfs')->putFileAs('', $pdf, $pdf_fileName);
            }

            // Guardar la imagen
            $img_fileName = null;
            if ($request->hasFile('img_filename')) {
                $img = $request->file('img_filename');
                $img_fileName = Str::uuid() . '.' . $img->getClientOriginalExtension();
                Storage::disk('paper_img')->putFileAs('', $img, $img_fileName);
            }

            Log::info("Paper stored successfully", [
                'titulo' => $request->titulo,
                'autores' => $request->autores,
                'descripcion' => $request->descripcion,
                'doi' => $request->doi,
                'fecha_publicacion' => $request->fecha_publicacion,
                'pdf_filename' => $pdf_fileName,
                'img_filename' => $img_fileName,
            ]);

            $paper = Patente::create([
                'titulo' => $request->titulo,
                'autores' => $request->autores,
                'descripcion' => $request->descripcion,
                'area_id' => $request->area_id,
                'doi' => $request->doi,
                'fecha_publicacion' => $request->fecha_publicacion,
                'pdf_filename' => $pdf_fileName,
                'img_filename' => $img_fileName,
            ]);

            Log::info("Paper stored successfully", ['paper' => $paper]);

            return redirect()->route('patentes.index')->with('success', 'Patente creada con éxito');
        } catch (ValidationException $e) {
            $errorMessage = implode('<br>', $e->validator->errors()->all());
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage);
        } catch (Exception $e) {
            //  Log::info("error", );

            return redirect()->back()->with('error', 'Error: ' . 'Hubo un error. Por favor, pruebe de nuevo');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patente = Patente::findOrFail($id);
        // Convertir JSON de autores a array para la vista
        $patente->autores = json_decode($patente->autores, true);
        return view('usuario.investigacion.detalle-patente', compact('patente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $this->handleFileSize();
            $messages = [
                'titulo.required' => 'El titulo es requerido.',
                'titulo.unique' => 'El titulo de este paper ya está registrado.',
                'autores.required' => 'El nombre de los autores es requerido.',
                'doi.unique' => 'Este DOI ya está en uso',
                'pdf_filename.mimes' => 'El archivo debe ser PDF.',
                'pdf_filename.max' => 'El PDF no debe exceder 10MB.',
                'img_filename.mimes' => 'La imagen debe ser JPEG, PNG, o JPG.',
            ];

            $validator = Validator::make($request->all(), [
                'titulo' => 'required|max:200',
                'autores' => 'required|json',
                'descripcion' => 'required',
                'area_id' => 'required|exists:areas_investigacion,id',
                'doi' => 'required|max:100',
                'fecha_publicacion' => 'required|date',
                'pdf_filename' => 'file|mimes:pdf|max:10240',
                'img_filename' => 'file|mimes:jpeg,png,jpg|max:5120',
            ], $messages);

            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            $patente = Patente::findOrFail($id);

            // Procesar autores (convertir array a JSON)
            //  $autoresJson = json_encode($request->edit_autores);

            // Actualizar el PDF si se sube uno nuevo
            if ($request->hasFile('pdf_filename')) {
                // Eliminar el PDF anterior si existe
                if ($patente->pdf_filename && Storage::disk('pdfs')->exists($patente->pdf_filename)) {
                    Storage::disk('pdfs')->delete($patente->pdf_filename);
                }

                $pdf = $request->file('pdf_filename');
                $pdf_fileName = Str::uuid() . '.' . $pdf->getClientOriginalExtension();
                Storage::disk('pdfs')->putFileAs('', $pdf, $pdf_fileName);
                // $patente->pdf_filename = $pdf_fileName;
            }

            // Actualizar la imagen si se sube una nueva
            if ($request->hasFile('img_filename')) {
                // Eliminar la imagen anterior si existe
                if ($patente->img_filename && Storage::disk('paper_img')->exists($patente->img_filename)) {
                    Storage::disk('paper_img')->delete($patente->img_filename);
                }

                $img = $request->file('img_filename');
                $img_fileName = Str::uuid() . '.' . $img->getClientOriginalExtension();
                Storage::disk('paper_img')->putFileAs('', $img, $img_fileName);
                //  $patente->img_filename = $img_fileName;
            }

            // Actualizar los demás campos
            $patente->update([
                'titulo' => $request->titulo,
                'autores' => $request->autores,
                'descripcion' => $request->descripcion,
                'area_id' => $request->area_id,
                'doi' => $request->doi,
                'fecha_publicacion' => $request->fecha_publicacion,
                'pdf_filename' => $pdf_fileName,
                'img_filename' => $img_fileName,
            ]);

            return redirect()->route('patentes.index')->with('edit', 'Patente actualizada con éxito');
        } catch (ValidationException $e) {
            $errorMessage = implode('<br>', $e->validator->errors()->all());
            return redirect()->back()
                ->withInput()
                ->with('error', $errorMessage);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error: ' . 'Hubo un error. Por favor, pruebe de nuevo');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $patente = Patente::findOrFail($id);

            // Eliminar archivos asociados
            if ($patente->pdf_filename && Storage::disk('pdfs')->exists($patente->pdf_filename)) {
                Storage::disk('pdfs')->delete($patente->pdf_filename);
            }

            if ($patente->img_filename && Storage::disk('paper_img')->exists($patente->img_filename)) {
                Storage::disk('paper_img')->delete($patente->img_filename);
            }

            $patente->delete();

            return redirect()->route('patentes.index')->with('destroy', 'Patente eliminada con éxito');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error al eliminar la patente: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $patente = Patente::find($id);

        if (!$patente) {
            return redirect()->route('patentes.index')
                ->with('error', 'Patente no encontrado');
        }

        $areas = AreaInvestigacion::all();

        return view('administrador.panel.patentes.edit', [
            'patente' => $patente,
            'areas' => $areas,
        ]);
    }

    public function formatAutores($autoresJson)
    {
        $autores = json_decode($autoresJson, true);

        if (is_array($autores)) {
            sort($autores); // ordenar alfabeticamente
            return implode(', ', $autores); // dar formato separado por coma
        }

        return '';
    }


}