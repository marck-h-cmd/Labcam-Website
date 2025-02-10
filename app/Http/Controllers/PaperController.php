<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Paper;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use App\Models\Topico;
use App\Models\AreaInvestigacion;
use Illuminate\Validation\ValidationException;
use Exception;


class PaperController extends Controller
{
  public function index(Request $request)
  {
    // inicializar 10 o menos papers
    $papers = Paper::paginate(5);


    // Dar formato a cada atributo de autores del paper para la view
    $papers->each(function ($paper) {
      $paper->formatted_autores = $this->formatAutores($paper->autores);
    });

    // Obtener áreas de investigación y topicos relacionadas con almenos un paper
    $topicos = Topico::has('papers')->get();
    $areas = AreaInvestigacion::has('papers')->get();


    if ($request->ajax()) {
      return response()->json([
        'papers' => $papers,
        'total' => $papers->count(),
        'html' => view('usuario.nosotros.partials.papers', compact('papers'))->render(),
        'links' => $papers->withQueryString()->links('vendor.pagination.simple-without-buttons')->toHtml(),
        'last_page' => $papers->lastPage(),
      ]);
    }
    return view('usuario.nosotros.biblioteca', compact('papers', 'topicos', 'areas'));
  }

  public function fetchMorePapers(Request $request)
  {
    try {

      $page = $request->input('page', 1);
      $perPage = $request->input('per_page', 5); // Papers por pagina

      // Fecth papers
      $papers = Paper::query()
        ->orderBy('created_at', 'desc')
        ->paginate($perPage, ['*'], 'page', $page);

      // Format autores 
      $papers->each(function ($paper) {
        $paper->formatted_autores = $this->formatAutores($paper->autores);
      });

      return response()->json([
        'html' => view('usuario.nosotros.partials.papers', ['papers' => $papers])->render(),
        'links' => $papers->links('vendor.pagination.simple-without-buttons')->toHtml(),
        'next_page_url' => $papers->nextPageUrl(),
        'total' => $papers->count(),
        'current_count' => $papers->count(),
        'papers' => $papers,
        'current_page' => $papers->currentPage(),
        'last_page' => $papers->lastPage(),
      ]);

    } catch (Exception $e) {
      Log::error("Fetch More Error: " . $e->getMessage());
      return response()->json([
        'error' => 'An error occurred while loading more papers'
      ], 500);
    }
  }

  public function search(Request $request)
  {
    try {
      // recibir el query y topicos desde la vista
      $query = $request->input('query');
      $topics = $request->input('topics') ? explode(',', $request->input('topics')) : [];
      $area = $request->input('area');
      $page = $request->input('page', 1);
      $perPage = 5;

      $papers = Paper::query();
      // buscar por titulo
      if ($query) {
        $papers->where('titulo', 'like', "%$query%");
      }
      // buscar por topicos seleccionados
      if (!empty($topics)) {
        $papers->whereHas('topicos', function ($q) use ($topics) {
          $q->whereIn('topicos.id', $topics);
        });
      }

      if ($area && is_numeric($area)) {
        $papers->where('area_id', $area);
      }

      $papers = $papers->paginate($perPage, ['*'], 'page', $page);
      // formato a los autores
      $papers->each(function ($paper) {
        $paper->formatted_autores = $this->formatAutores($paper->autores);
      });

      return response()->json([
        'papers' => $papers,
        'total' => $papers->count(),
        'html' => view('usuario.nosotros.partials.papers', ['papers' => $papers])->render(),
        'links' => $papers->withQueryString()->links('vendor.pagination.simple-without-buttons')->toHtml(),
        'show_load_more' => $papers->isEmpty(),
        'next_page_url' => $papers->nextPageUrl(),
        'last_page' => $papers->lastPage(),
        'current_page' => $papers->currentPage(),
      ]);
    } catch (Exception $e) {
      Log::error("Error: " . $e->getMessage());
      return response()->json(['error' => 'An error occurred during the search process.'], 500);
    }
  }


  public function storePaper(Request $request)
  {

    try {
      // mensajes de error
      $messages = [
        'titulo.required' => 'El titulo es requerido.',
        'autores.required' => 'El nombre de los autores es requerido.',
        'titulo.unique' => 'El titulo de esta paper ya esta registrado.',
        'doi.unique' => 'Este DOI ya esta en uso',
        'pdf_filename.mimes' => 'El archivo debe ser PDF.',
        'pdf_filename.max' => 'El PDF no debe exceder 10MB.',
        'img_filename.mimes' => 'La imagen debe ser bJPEG, PNG, o JPG.',
        'img_filename.max' => 'La imagen no debe exceder 5MB.',

      ];

      // validar campos
      $request->validate([
        'autores' => 'required|json',
        'titulo' => 'required|string|max:100|unique:papers,titulo',
        'publisher' => 'required|string|max:50',
        'descripcion' => 'required',
        'area_id' => 'required|exists:areas_investigacion,id',
        'fecha_publicacion' => 'required|date',
        'doi' => 'required|string|max:100|unique:papers,doi',
        'pdf_filename' => 'required|file|mimes:pdf|max:10240',
        'img_filename' => 'required|file|mimes:jpeg,png,jpg|max:5120',
        'topicos' => 'required|string',
        'topicos.*' => 'exists:topicos,id',

      ], $messages);

      $topicoIds = explode(',', $request->topicos);

      $pdf_fileName = null;
      $img_fileName = null;

      // Guardar el pdf con un string aleatorio para almacenarlo en storage/uploads/pdfs
      if ($request->hasFile('pdf_filename')) {
        $pdf = $request->file('pdf_filename');
        $pdf_fileName = Str::uuid() . '.' . $pdf->getClientOriginalName();
        Storage::disk('pdfs')->putFileAs('', $pdf, $pdf_fileName);
      }

      // Guardar la imagen paper con un string aleatorio para almacenarlo en storage/uploads/img_paper
      if ($request->hasFile('img_filename')) {
        $img = $request->file('img_filename');
        $img_fileName = Str::uuid() . '.' . $img->getClientOriginalName();
        Storage::disk('paper_img')->putFileAs('', $img, $img_fileName);
      }

      $paper = Paper::create([
        'titulo' => $request->titulo,
        'autores' => $request->autores,
        'publisher' => $request->publisher,
        'descripcion' => $request->descripcion,
        'area_id' => $request->area_id,
        'doi' => $request->doi,
        'fecha_publicacion' => $request->fecha_publicacion,
        'pdf_filename' => $pdf_fileName,
        'img_filename' => $img_fileName,
      ]);
      $paper->topicos()->attach($topicoIds);

      Log::info("Paper stored successfully", ['paper' => $paper]);

      return redirect()->route('papers.create')
        ->with('success', 'Nuevo paper creado exitosamente.');
    } catch (ValidationException $e) {
      $errorMessage = implode('<br>', $e->validator->errors()->all());
      return redirect()->back()
        ->withInput()
        ->with('error', $errorMessage);
    } catch (Exception $e) {
      Log::error("Error storing paper: " . $e->getMessage());

      return redirect()->back()->with('error', 'Error: ' . 'Hubo un error. Porfavor, pruebe denuevo');
    }

  }

  public function update(Request $request, $id)
  {
    try {

      // mensajes de error
      $messages = [
        'titulo.required' => 'El titulo es requerido.',
        'titulo.unique' => 'El titulo de esta paper ya esta registrado.',
        'autores.required' => 'El nombre de los autores es requerido.',
        'doi.unique' => 'Este DOI ya esta en uso',
        'pdf_filename.mimes' => 'El archivo debe ser PDF.',
        'pdf_filename.max' => 'El PDF no debe exceder 10MB.',
        'img_filename.mimes' => 'La imagen debe ser bJPEG, PNG, o JPG.',
        'img_filename.max' => 'La imagen no debe exceder 5MB.',

      ];
      // validar campos
      $request->validate([
        'titulo' => 'required|max:100',
        'autores' => 'required|json',
        'publisher' => 'required|max:50',
        'descripcion' => 'required',
        'area_id' => 'required|exists:areas_investigacion,id',
        'doi' => 'required|max:100',
        'fecha_publicacion' => 'required|date',
        'pdf_filename' => 'file|mimes:pdf|max:10240',
        'img_filename' => 'file|mimes:jpeg,png,jpg|max:5120',
        'topicos' => 'string',
        'topicos.*' => 'exists:topicos,id',

      ], $messages);
      $paper = Paper::findOrFail($id);

      $topicoIds = explode(',', $request->topicos);

      $pdf_fileName = $paper->pdf_filename;
      $img_fileName = $paper->img_filename;

      if ($request->hasFile('pdf_filename')) {
        // Borrar antiguo PDF si existe
        if ($paper->pdf_filename && Storage::disk('pdfs')->exists($pdf_fileName)) {
          Storage::disk('pdfs')->delete($pdf_fileName);
        }

        // Remplazar por nuevo pdf
        $pdf = $request->file('pdf_filename');
        $pdf_fileName = Str::uuid() . '.' . $pdf->getClientOriginalExtension();
        Storage::disk('pdfs')->putFileAs('', $pdf, $pdf_fileName);
      }


      if ($request->hasFile('img_filename')) {
        // Borrar antigua imagen si existe
        if ($paper->img_filename && Storage::disk('paper_img')->exists($img_fileName)) {
          Storage::disk('paper_img')->delete($img_fileName);
        }

        // Remplazar por nueva imagen
        $img = $request->file('img_filename');
        $img_fileName = Str::uuid() . '.' . $img->getClientOriginalExtension();
        Storage::disk('paper_img')->putFileAs('', $img, $img_fileName);
      }

      $paper->update([
        'titulo' => $request->titulo,
        'autores' => $request->autores,
        'publisher' => $request->publisher,
        'descripcion' => $request->descripcion,
        'area_id' => $request->area_id,
        'doi' => $request->doi,
        'fecha_publicacion' => $request->fecha_publicacion,
        'pdf_filename' => $pdf_fileName,
        'img_filename' => $img_fileName,
      ]);

      $paper->topicos()->sync($topicoIds);

      return redirect()->route('papers.index')
        ->with('edited', 'Paper actualizado exitosamente.');
    } catch (ValidationException $e) {
      $errorMessage = implode('<br>', $e->validator->errors()->all());
      return redirect()->back()
        ->withInput()
        ->with('error', $errorMessage);
    } catch (Exception $e) {
      Log::error("Error updating paper: " . $e->getMessage());

      return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
  }

  public function destroy($id)
  {
    $paper = Paper::find($id);

    if (!$paper) {
      return redirect()->route('papers.index')
        ->with('error', 'Paper no encontrado');
    }

    // Borrar el pdf en la ruta storage/uploads/pdfs
    if ($paper->pdf_filename) {
      Storage::disk('pdfs')->delete($paper->pdf_filename);
    }

    // Borrar la imagen en la ruta storage/uploads/paper_img
    if ($paper->img_filename) {
      Storage::disk('paper_img')->delete($paper->img_filename);
    }
    $paper->delete();
    return redirect()->route('papers.index')
      ->with('success', 'Paper eliminado exitosamente');
  }

  public function fetchByArea($areaId)
  {

    $papers = Paper::where('area_id', $areaId)->paginate(10);
    $papers->each(function ($paper) {
      $paper->formatted_autores = $this->formatAutores($paper->autores);
    });

    $topicos = Topico::has('papers')->get();
    $areas = AreaInvestigacion::has('papers')->get();



    return view('usuario.nosotros.biblioteca', compact('papers', 'topicos', 'areas'));
  }


  // Función para mostrar papers en el panel
  public function adminIndex(Request $request): View
  {
    $query = $request->input('search');
    // $papers = Paper::paginate(10);
    $papers = Paper::when($query, function ($queryBuilder) use ($query) {
      $queryBuilder->where('titulo', 'like', '%' . $query . '%')
        ->orWhereHas('area', function ($q) use ($query) {
          $q->where('nombre', 'like', '%' . $query . '%');
        });
    })->paginate(10);

    $papers->each(function ($paper) {
      $paper->formatted_autores = $this->formatAutores($paper->autores);
    });

    return view('administrador.panel.paper-panel', compact('papers'))
      ->with('i', ($request->input('page', 1) - 1) * $papers->perPage());
  }

  public function create()
  {
    return view('administrador.panel.paper.create', [
      'areas' => AreaInvestigacion::all(),
      'topicos' => Topico::all()
    ]);
  }

  public function show($id)
  {
    $paper = Paper::find($id);
    //FORMATO DE AUTORES
    $paper->formatted_autores = $this->formatAutores($paper->autores);
    // PAPERS ANTERIOR Y SIGUIENTE
    $previousPaper = Paper::where('id', '<', $paper->id)->orderBy('id', 'desc')->first();
    $nextPaper = Paper::where('id', '>', $paper->id)->orderBy('id', 'asc')->first();
    return view('usuario.nosotros.paper', compact('paper', 'previousPaper', 'nextPaper'));
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


  public function edit($id)
  {
    $paper = Paper::find($id);

    if (!$paper) {
      return redirect()->route('papers.index')
        ->with('error', 'Paper no encontrado');
    }

    $areas = AreaInvestigacion::where('id', '!=', $paper->area->id)->get('*');

    return view('administrador.panel.paper.edit', [
      'paper' => $paper,
      'areas' => $areas,
      'topicos' => Topico::all()
    ]);
  }



}
