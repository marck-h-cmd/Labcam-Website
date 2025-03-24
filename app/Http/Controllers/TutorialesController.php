<?php

namespace App\Http\Controllers;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;
use Exception;


class TutorialesController extends Controller
{
    public function index(Request $request)
    {
        $tutorials=Tutorial::paginate(10);
        return view('administrador.tutoriales.panel', compact('tutorials')); 
    }
    public function store(Request $request)
    {
        try {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'files' => 'required|array|max:5',
            'files.*' => 'file|mimes:pdf,mp4,rar,zip', 
        ]);

        $title = $request->input('titulo');
        $files = $request->file('files');

        // Almacenar archivos en  public/uploads/tutorials
        $filePaths = [];
        foreach ($files as $file) {
            $path = $file->store('public/uploads/tutorials');
            $filePaths[] = Storage::url($path); 
        }

    
        $tutorial = Tutorial::create([
            'titulo' => $title,
            'file_paths' => $filePaths,
        ]);

        return redirect()->route('tutorials.index', $tutorial->id)->with('success', 'Tutorial uploaded successfully.');
   
      } catch (Exception $e) {
        Log::error("Error storing tutorial: " . $e->getMessage());
  
        return redirect()->back()->with('error', 'Error: ' . 'Hubo un error. Porfavor, pruebe denuevo');
      }

       
    }

     
      public function show($id)
      {
          $tutorial = Tutorial::findOrFail($id);
  
          // Organizar archivos por tipo
          $filesByType = [];
          foreach ($tutorial->file_paths as $filePath) {
              $extension = pathinfo($filePath, PATHINFO_EXTENSION);
              $filesByType[$extension][] = [
                  'name' => basename($filePath),
                  'url' => $filePath,
              ];
          }
  
          return view('tutorials.index', compact('tutorial', 'filesByType'));
      }
  
     
      public function destroy($id)
      {
          $tutorial = Tutorial::findOrFail($id);
  
          // Delete files from storage
          foreach ($tutorial->file_paths as $filePath) {
              $filePath = str_replace('/storage', 'public', $filePath);
              Storage::delete($filePath);
          }
  
          // Eliminar tutorial de la base de datos
          $tutorial->delete();
  
          return redirect()->route('tutorials.index')->with('destroyed', 'Tutorial deleted successfully.');
      }
}
