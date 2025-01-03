<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paper;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Http\Response;


class PaperController extends Controller
{
    public function index(Request $request)
    {
        // inicializar 3 o menos papers
        $amount = $request->query('count', 3);

        $papers= Paper::take($amount)->get();

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
        $request->validate([
            'titulo' => 'required|max:100',
            'autores' => 'required|json',
            'publisher' => 'required|max:50',
            'descripcion' => 'required',
            'doi' => 'required|max:100',
            'fecha_publicacion' => 'required',
            'pdf_filename' => 'required',
            'img_filename' => 'required',

          ]);
          Paper::create($request->all());
          return redirect()->route('papers.create')
            ->with('success', 'Nuevo paper creado exitosamente.');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|max:100',
            'autores' => 'required|json',
            'publisher' => 'required|max:50',
            'descripcion' => 'required',
            'doi' => 'required|max:100',
            'fecha_publicacion' => 'required',
            'pdf_filename' => 'required',
            'img_filename' => 'required',

          ]);
      $paper = Paper::find($id);
      $paper->update($request->all());
      return redirect()->route('paper-panel')
        ->with('success', 'Paper actualizado exitosamente.');
    }

    public function destroy($id)
    {
      $paper = Paper::find($id);
      $paper->delete();
      return redirect()->route('paper-panel')
        ->with('success', 'Post deleted successfully');
    }

    public function adminIndex(Request $request): View
    {
        $papers = Paper::paginate();

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
      return view('administrador.panel.paper.show', compact('paper'));
    }
 
    public function edit($id)
    {
      $paper = Paper::find($id);
      return view('administrador.panel.paper.edit', compact('paper'));
    }



}
