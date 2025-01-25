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
use Exception;


class PaperController extends Controller
{
  public function index(Request $request)
  {
    // inicializar 3 o menos papers
    $amount = $request->query('count', 4);

    $papers = Paper::take($amount)->get();

    // Dar formato a cada atributo de autores del paper para la view
    $papers->each(function ($paper) {
      $paper->formatted_autores = $this->formatAutores($paper->autores);
    });

    $totalPapers = Paper::count();

    // Conteo de papers restantes
    $displayCount = $totalPapers - $amount;

    // Obtener áreas de investigación y topicos relacionadas con almenos un paper
    $topicos = Topico::has('papers', '>=', 1)->get();
    $areas = AreaInvestigacion::has('papers', '>=', 1)->get();

    return view('usuario.nosotros.biblioteca', compact('papers', 'displayCount', 'topicos', 'areas'));
  }

  public function fetchMorePapers(Request $request)
  {
    // data inicial
    $offset = $request->input('offset', 0);
    $limit = $request->input('limit', 3);


    // recibir 3 papers más
    $papers = Paper::skip($offset)->take($limit)->get();
    $papers->each(function ($paper) {
      $paper->formatted_autores = $this->formatAutores($paper->autores);
    });

    $totalPapers = Paper::count();

    // retornar la información en json
    return response()->json([
      'papers' => $papers,
      'total' => $totalPapers,
      'remaining' => max(0, $totalPapers - ($offset + $limit)),
    ]);

  }

  public function search(Request $request)
  {
    try {
      // recibir el query y topicos desde la vista
      $query = $request->input('query');
      $topics = $request->input('topics') ? explode(',', $request->input('topics')) : [];

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
      $papers = $papers->get();
      // formato a los autores
      $papers->each(function ($paper) {
        $paper->formatted_autores = $this->formatAutores($paper->autores);
      });
      $totalPapers = $papers->count();
      $offset = $request->input('offset', 0);
      $limit = $request->input('limit', 3);

      //Log::info($papers->toSql());
      return response()->json([
        'papers' => $papers,
        'total' => $totalPapers,
        'remaining' => max(0, $totalPapers - ($offset + $limit)),
      ], 200, ['Content-Type' => 'application/json']);
    } catch (Exception $e) {
      Log::error("Error: " . $e->getMessage());
      return response()->json(['error' => 'An error occurred during the search process.'], 500);
    }
  }


  public function storePaper(Request $request)
  {

    try {
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

      ]);

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
    } catch (Exception $e) {
      Log::error("Error storing paper: " . $e->getMessage());

      return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }

  }

  public function update(Request $request, $id)
  {
    try {
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

      ]);
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

    $papers = Paper::all()->where('area_id', $areaId);
    $papers->each(function ($paper) {
      $paper->formatted_autores = $this->formatAutores($paper->autores);
    });

    $topicos = Topico::has('papers', '>', 0)->get();
    $areas = AreaInvestigacion::has('papers', '>', 0)->get();


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
