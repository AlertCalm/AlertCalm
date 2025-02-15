<?php

namespace App\Http\Controllers;
use App\Models\Meditation;
use Illuminate\Http\Request;

class MeditationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $meditation=Meditation::all();
        if($meditation->isEmpty()){
            return response()->json([
                'error'=>'No se han encontrado meditaciones.'], 404);
        }else{
            return response()->json([
                'success' => 'Meditaciones encontradas',
                'data' => $meditation], 200);
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
        $validardatos=$request->validate([
            'titulo'   => 'required|string|max:205',
            'categoria'  => 'required|in:relajacion,respiracion,mindfulness,otra',
            'file_url'   => 'required|string|max:512',
            'duracion'   => 'required|date_format:H:i:s',
            'lenguaje'   => 'nullable|string|max:3'
        ]);

        // si en lenguaje no s emanda nada el valor por defecto será es
        $lenguaje = $validardatos['lenguaje'] ?? 'es';

        $meditacion = new Meditation();
        $meditacion->titulo = $validardatos['titulo'];
        $meditacion->categoria = $validardatos['categoria'];
        $meditacion->file_url = $validardatos['file_url'];
        $meditacion->duracion = $validardatos['duracion'];
        $meditacion->lenguaje = $lenguaje['lenguaje'];
    
        $guardado = $meditacion->save();
    
        if ($guardado) {
            return response()->json([
                'success' => 'Meditación creada con éxito',
                'data' => $meditacion
            ], 201);
        } else {
            return response()->json([
                'error' => 'Hubo un problema al crear la meditación.'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $meditacion=Meditation::find($id);
        if($meditacion){
            return response()->json(
                ['success'=>'Meditacion encontrada',
                'data'=>$meditacion], 200);
        }else{
            $meditaciones=Meditation::All();
            return response()->json(
                ['error'=>'Meditacion no encontrada',
                'Lista meditaciones'=>$meditaciones], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $meditacion = Meditation::find($id);
        if (!$meditacion) {
            return response()->json(['error' => 'Meditacion no encontrada'], 404);
        }
        return response()->json(['success' => 'Meditacion encontrado', 'data' => $meditacion], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $meditacion=Meditation::find($id);
        if($meditacion){
            $validardatos=$request->validate([
                'titulo'   => 'required|string|max:205',
                'categoria'  => 'required|in:relajacion,respiracion,mindfulness,otra',
                'file_url'   => 'required|string|max:512',
                'duracion'   => 'required|date_format:H:i:s',
                'lenguaje'   => 'nullable|string|max:3'
            ]);
    
            // si en lenguaje no s emanda nada el valor por defecto será es
            $lenguaje = $validardatos['lenguaje'] ?? 'es';
    
            $meditacion->titulo = $validardatos['titulo'];
            $meditacion->categoria = $validardatos['categoria'];
            $meditacion->file_url = $validardatos['file_url'];
            $meditacion->duracion = $validardatos['duracion'];
            $meditacion->lenguaje = $lenguaje;
        
            $guardado = $meditacion->save();
            return response()->json([
                'success'=>'Meditación actualizada',
                'data'=>$meditacion
            ], 200);
        }else{
            $meditaciones=Meditation::all();
            return response()->json([
                'error'=>'No se ha encontardo la meditacion para poder editarla.',
                'Lista alertas'=>$meditaciones
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $meditationElim=Meditation::find($id);
        if(!$meditationElim){
            $meditaciones=Meditation::all();
            return response()->json([
                'error'=>'No se ha encontrado la meditacion con ese id',
                'lista meditaciones'=>$meditaciones
            ], 404);
        }else{
            $meditationElim->delete();
            return response()->json([
                'success'=>'Meditación eliminada.',
                'data'=>$meditationElim
            ],200);
        }
    }
}
