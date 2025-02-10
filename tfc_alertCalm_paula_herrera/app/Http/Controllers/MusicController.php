<?php

namespace App\Http\Controllers;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $music = Music::all();
        if ($music->isEmpty()) {
            return response()->json([
                'error' => 'No se ha encontrado música.'
            ], 404);
        } else {
            return response()->json([
                'success' => 'Músicas encontrada',
                'data' => $music
            ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validardatos = $request->validate([
            'titulo'    => 'required|string|max:255',
            'categoria' => 'required|in:relajacion,ansiedad,respiracion,motivacion,meditacion',
            'file_url'  => 'required|string|max:512',
            'duracion'  => 'required|date_format:H:i:s',
            'lenguaje'  => 'nullable|string|max:3',
        ]);

        // Si en lenguaje no se manda nada, el valor por defecto será 'es'
        $lenguaje = $validardatos['lenguaje'] ?? 'es';

        $musica = new Music();
        $musica->titulo = $validardatos['titulo'];
        $musica->categoria = $validardatos['categoria'];
        $musica->file_url = $validardatos['file_url'];
        $musica->duracion = $validardatos['duracion'];
        $musica->lenguaje = $lenguaje;

        $guardado = $musica->save();

        if ($guardado) {
            return response()->json([
                'success' => 'Música creada con éxito',
                'data' => $musica
            ], 201);
        } else {
            return response()->json([
                'error' => 'Hubo un problema al crear la música.'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $musica = Music::find($id);
        if ($musica) {
            return response()->json([
                'success' => 'Música encontrada',
                'data' => $musica
            ], 200);
        } else {
            return response()->json([
                'error' => 'Música no encontrada'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $musica = Music::find($id);
        if (!$musica) {
            return response()->json(['error' => 'Música no encontrada'], 404);
        }
        return response()->json(['success' => 'Música encontrada', 'data' => $musica], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $musica = Music::find($id);
        if ($musica) {
            $validardatos = $request->validate([
                'titulo'    => 'required|string|max:255',
                'categoria' => 'required|in:relajacion,ansiedad,respiracion,motivacion,meditacion',
                'file_url'  => 'required|string|max:512',
                'duracion'  => 'required|date_format:H:i:s',
                'lenguaje'  => 'nullable|string|max:3',
            ]);

            // Si en lenguaje no se manda nada, el valor por defecto será 'es'
            $lenguaje = $validardatos['lenguaje'] ?? 'es';

            $musica->titulo = $validardatos['titulo'];
            $musica->categoria = $validardatos['categoria'];
            $musica->file_url = $validardatos['file_url'];
            $musica->duracion = $validardatos['duracion'];
            $musica->lenguaje = $lenguaje;

            $guardado = $musica->save();

            return response()->json([
                'success' => 'Música actualizada',
                'data' => $musica
            ], 200);
        } else {
            return response()->json([
                'error' => 'No se ha encontrado la música para actualizarla.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $musica = Music::find($id);
        if (!$musica) {
            return response()->json([
                'error' => 'No se ha encontrado la música con ese id'
            ], 404);
        } else {
            $musica->delete();
            return response()->json([
                'success' => 'Música eliminada.',
                'data' => $musica
            ], 200);
        }
    }
}
