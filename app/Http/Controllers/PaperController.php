<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Paper;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Exception;


class PaperController extends Controller
{
    public function index(Request $request)
    {
        // inicializar 3 o menos papers
        $amount = $request->query('count', 3);

        $papers= Paper::take($amount)->get();

        $papers->each(function($paper) {
          $paper->formatted_autores = $this->formatAutores($paper->autores);
        });

        $totalPapers = Paper::count();

        $displayCount = $totalPapers -  $amount;

        return view('usuario.nosotros.biblioteca', compact('papers','displayCount'));
    }

    public function fetchMorePapers(Request $request)
    {
        // data inicial
         $offset = $request->input('offset', 0);
         $limit = $request->input('limit', 3);

 
         // recibir 3 papers más
         $papers = Paper::skip($offset)->take($limit)->get();
         $papers->each(function($paper) {
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

    public function storePaper(Request $request)
    {

      try{

        $request->validate([
          'titulo' => 'required|max:100',
          'autores' => 'required|json',
          'publisher' => 'required|max:50',
          'descripcion' => 'required',
          'area' => 'required|max:60',
          'doi' => 'required|max:100',
          'fecha_publicacion' => 'required',
          'pdf_filename' => 'required|file|mimes:pdf|max:10240',
          'img_filename' => 'required|file|mimes:jpeg,png,jpg|max:5120',

        ]);

        $pdf_fileName = null;
        $img_fileName = null;

        if ($request->hasFile('pdf_filename')) {
          $pdf = $request->file('pdf_filename');
          $pdf_fileName = Str::uuid() . '.' . $pdf->getClientOriginalName(); 
          Storage::disk('pdfs')->putFileAs('', $pdf, $pdf_fileName);
        }
  
        if ($request->hasFile('img_filename')) {
          $img = $request->file('img_filename');
          $img_fileName = Str::uuid() . '.' . $img->getClientOriginalName(); 
          Storage::disk('paper_img')->putFileAs('', $img, $img_fileName);
        }

      $paper = Paper::create([
          'titulo' =>  $request->titulo,
          'autores' =>  $request->autores,
          'publisher' =>  $request->publisher,
          'descripcion' =>  $request->descripcion,
          'area' =>   $request->area,
          'doi' =>  $request->doi,
          'fecha_publicacion' => $request->fecha_publicacion,
          'pdf_filename' => $pdf_fileName,
          'img_filename' => $img_fileName,
      ]);

      Log::info("Paper stored successfully", ['paper' => $paper]);

        return redirect()->route('papers.create')
          ->with('success', 'Nuevo paper creado exitosamente.');
      }catch(Exception $e) {
        Log::error("Error storing paper: " . $e->getMessage());

        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }

    }

    public function update(Request $request, $id)
    {
      try{
      $request->validate([
        'titulo' => 'required|max:100',
        'autores' => 'required|json',
        'publisher' => 'required|max:50',
        'descripcion' => 'required',
        'area' => 'required|max:60',
        'doi' => 'required|max:100',
        'fecha_publicacion' => 'required',
        'pdf_filename' => 'required|file|mimes:pdf|max:10240',
        'img_filename' => 'required|file|mimes:jpeg,png,jpg|max:5120',

      ]);
      $paper = Paper::find($id);

      $pdf_fileName = $paper->pdf_filename;
      $img_fileName = $paper->img_filename;

      if ($paper->pdf_filename!=$pdf_fileName) {
        Storage::disk('pdfs')->delete( $pdf_fileName);
        $pdf = $request->file('pdf_filename');
        $pdf_fileName = Str::uuid() . '.' . $pdf->getClientOriginalName(); 
        Storage::disk('pdfs')->putFileAs('', $pdf, $pdf_fileName);
      }

      if ($paper->img_filenamepdf_filename!=$img_fileName) {
        Storage::disk('paper_img')->delete($img_fileName);
        $img = $request->file('img_filename');
        $img_fileName = Str::uuid() . '.' . $img->getClientOriginalName(); 
        Storage::disk('paper_img')->putFileAs('', $img, $img_fileName);
      }

      $paper->update([
        'titulo' =>  $request->titulo,
        'autores' =>  $request->autores,
        'publisher' =>  $request->publisher,
        'descripcion' =>  $request->descripcion,
        'area' =>   $request->area,
        'doi' =>  $request->doi,
        'fecha_publicacion' => $request->fecha_publicacion,
        'pdf_filename' => $pdf_fileName,
        'img_filename' => $img_fileName,
    ]);
      return redirect()->route('paper-panel')
        ->with('success', 'Paper actualizado exitosamente.');
      }catch(Exception $e) {
        Log::error("Error updating paper: " . $e->getMessage());

        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
    }

    public function destroy($id)
    {
      $paper = Paper::find($id);

      if (!$paper) {
        return redirect()->route('paper-panel')
            ->with('error', 'Paper no encontrado');
      }


      if ($paper->pdf_filename) {
        Storage::disk('pdfs')->delete($paper->pdf_filename);
      }

      if ($paper->img_filename) {
        Storage::disk('paper_img')->delete($paper->img_filename);
      }
      $paper->delete();
      return redirect()->route('paper-panel')
        ->with('success', 'Paper borrado exitosamente');
    }

    public function findByArea($area){

      $papers = Paper::all()->where('area', $area);

      return view('usuario.nosotros.biblioteca', compact('papers'));

    }

    public function adminIndex(Request $request): View
    {
        $papers = Paper::paginate();
        $papers->each(function($paper) {
          $paper->formatted_autores = $this->formatAutores($paper->autores);
        });

        return view('administrador.panel.paper-panel', compact('papers'))
            ->with('i', ($request->input('page', 1) - 1) * $papers->perPage());
    }

    public function create()
    {
      return view('administrador.panel.paper.create');
    }
   
    public function show($id)
    {
      $paper = Paper::find($id);
      $paper->formatted_autores = $this->formatAutores($paper->autores);
      return view('usuario.nosotros.paper', compact('paper'));
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
        return redirect()->route('paper-panel')
            ->with('error', 'Paper no encontrado');
      }

      return view('administrador.panel.paper.edit', compact('paper'));
    }



}
