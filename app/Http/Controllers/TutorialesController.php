<?php

namespace App\Http\Controllers;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use Exception;


class TutorialesController extends Controller
{
    public function index(Request $request)
    {
        $tutorials = Tutorial::paginate(10);
        return view('administrador.tutoriales.panel', compact('tutorials'));
    }
    public function store(Request $request)
    {
        try {
           
            $this->handleFileSize();
            $request->validate([
                'titulo' => 'required|string|max:255',
                'files' => 'required|array|max:5',
                'files.*' => 'file|mimes:pdf,mp4,rar,zip|max:102400',
            ]);

            $title = $request->input('titulo');
            $files = $request->file('files');

            // Generar un folder para cada tutorial
            $folderName = 'tutorials/' . Str::random(6) . '_' . time();

            // Guardar archivos
            $filePaths = [];
            foreach ($files as $file) {
                $fileName = $file->getClientOriginalName();
                $path = $file->storeAs($folderName, $fileName, 'public');
                $filePaths[] = Storage::url($path);
            }


            $tutorial = Tutorial::create([
                'titulo' => $title,
                'file_paths' => $filePaths,
            ]);

            return redirect()->route('tutorials.index', $tutorial->id)->with('success', 'Tutorial subido exitosamente.');

        } catch (Exception $e) {
            Log::error("Error storing tutorial: " . $e->getMessage());

            return redirect()->back()->with('error', 'Error: ' . 'Hubo un error. Porfavor, pruebe denuevo');
        }


    }

    public function handleFileSize(){
        ini_set('post_max_size', '100M');
        ini_set('upload_max_filesize', '100M');
        ini_set('max_execution_time', '300');
    }
    public function update(Request $request, $id)
    {
        try {
            $this->handleFileSize();

            $tutorial = Tutorial::findOrFail($id);

            // Convertir file_paths a un array en caso no sea
            $currentFiles = $tutorial->file_paths ? (array) $tutorial->file_paths : [];

            $request->validate([
                'edit_titulo' => 'required|string|max:255',
                'edit_files' => 'sometimes|array|max:5',
                'edit_files.*' => 'file|mimes:pdf,mp4,rar,zip|max:102400',
                'files_to_delete' => 'sometimes|array'
            ]);

            $tutorial->titulo = $request->input('edit_titulo');

            if ($request->has('files_to_delete')) {
                foreach ($request->input('files_to_delete') as $filePath) {
                    Storage::disk('public')->delete($filePath);
                }

                // Crear nuevo array sin eliminar archivos
                $currentFiles = array_diff($currentFiles, $request->input('files_to_delete'));
            }

            // Archivos
            $newFilePaths = [];
            if ($request->has('edit_files')) {
                $folderName = 'tutorials/' . Str::random(6) . '_' . time();

                foreach ($request->file('edit_files') as $file) {
                    $fileName = $file->getClientOriginalName();
                    $path = $file->storeAs($folderName, $fileName, 'public');
                    $newFilePaths[] = Storage::url($path);
                }
            }

            // Combinar existentes con los nuevos 
            $allFiles = array_merge($currentFiles, $newFilePaths);

            if (count($allFiles) > 5) {
                throw ValidationException::withMessages([
                    'edit_files' => 'The total number of files cannot exceed 5.'
                ]);
            }

            $tutorial->file_paths = $allFiles;
            $tutorial->save();

            return redirect()->route('tutorials.index')->with('edit', 'Tutorial actualizado exitosamente.');
        } catch (Exception $e) {
            Log::error("Error updating tutorial: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error: ' . 'Hubo un error. Porfavor, pruebe denuevo');
        }
    }


    public function show($id)
    {
        $tutorial = Tutorial::findOrFail($id);

        // Organizar archivos por tipo
        $filesByType = [
            'videos' => [],
            'pdfs' => [],
            'archives' => []
        ];

        foreach ($tutorial->file_paths as $filePath) {
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);
            $fileName = basename($filePath);

            $fileData = [
                'name' => $fileName,
                'url' => $filePath,
                'extension' => $extension
            ];

            switch (strtolower($extension)) {
                case 'mp4':
                    $filesByType['videos'][] = $fileData;
                    break;
                case 'pdf':
                    $filesByType['pdfs'][] = $fileData;
                    break;
                case 'zip':
                case 'rar':
                    $filesByType['archives'][] = $fileData;
                    break;
            }
        }

        return view('administrador.tutoriales.show', compact('tutorial', 'filesByType'));
    }


    public function destroy($id)
    {
        try {
            $tutorial = Tutorial::findOrFail($id);

            // Eliminar directorio principal si existe
            if (!empty($tutorial->file_paths)) {
                $firstFilePath = $tutorial->file_paths[0];
                $storagePath = str_replace('/storage/', '', $firstFilePath);
                $parentDirectory = dirname($storagePath);

                // Eliminar todo el directorio
                Storage::disk('public')->deleteDirectory($parentDirectory);
            }

            // Eliminar tutorial de la base de datos
            $tutorial->delete();


            return redirect()->route('tutorials.index')->with('destroy', 'Tutorial eliminado exitosamente.');

        } catch (Exception $e) {
            Log::error("Error deleting tutorial: " . $e->getMessage());
            return redirect()->back()->with('error', 'Error deleting tutorial');
        }
    }
}

