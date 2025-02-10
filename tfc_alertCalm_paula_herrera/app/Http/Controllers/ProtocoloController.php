<?php

namespace App\Http\Controllers;
use App\Models\Protocolo;
use App\Models\Alerta;
use Illuminate\Http\Request;

class ProtocoloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $protocolos=Protocolo::all();
         if ($protocolos->isEmpty()) {
            return response()->json([
                'error' => 'No se han encontrado protocolos.'
            ], 404);
        } else {
            return response()->json([
                'success' => 'Protocolos encontrados',
                'data' => $protocolos
            ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Muestra el formulario para crear un nuevo protocolo
        return view('protocolos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validardatos = $request->validate([
            'tipo_emergencia'   => 'required|in:inundacion,terremoto,incendio,otro',
            'descripcion_protocolo' => 'required|string',
            'alert_id'           => 'required|int',
            'documento_url'      => 'nullable|url',
        ]);

        // Verificar si el alert existe en la base de datos
        $alert = Alerta::find($validardatos['alert_id']);
        if (!$alert) {
            return response()->json([
                'error' => 'El alert_id proporcionado no existe en nuestra base de datos.'
            ], 404);
        }

        $protocolo = new Protocolo();
        $protocolo->tipo_emergencia = $validardatos['tipo_emergencia'];
        $protocolo->descripcion_protocolo = $validardatos['descripcion_protocolo'];
        $protocolo->alert_id = $validardatos['alert_id'];
        $protocolo->documento_url = $validardatos['documento_url'];

        $guardado = $protocolo->save();

        if ($guardado) {
            return response()->json([
                'success' => 'Protocolo creado con éxito.',
                'data' => $protocolo
            ], 201);
        } else {
            return response()->json([
                'error' => 'Hubo un problema al crear el protocolom.'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $protocolo = Protocolo::find($id);
        if ($protocolo) {
            return response()->json([
                'success' => 'Protocolo encontrado',
                'data' => $protocolo
            ], 200);
        } else {
            return response()->json([
                'error' => 'Protocolo no encontrado'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $protocolo = Protocolo::find($id);
        if (!$protocolo) {
            return response()->json(['error' => 'protocolo no encontrado'], 404);
        }
        return response()->json(['success' => 'protocolo encontrado', 'data' => $protocolo], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $protocolo = Protocolo::find($id);
        if ($protocolo) {
            $validardatos = $request->validate([
                'tipo_emergencia'   => 'required|in:inundacion,terremoto,incendio,otro',
                'descripcion_protocolo' => 'required|string',
                'alert_id'           => 'required|int',
                'documento_url'      => 'nullable|url',
            ]);
    
            // Verificar si el alert existe en la base de datos
            $alert = Alerta::find($validardatos['alert_id']);
            if (!$alert) {
                return response()->json([
                    'error' => 'El alert_id proporcionado no existe en nuestra base de datos.'
                ], 404);
            }

            $protocolo->tipo_emergencia = $validardatos['tipo_emergencia'];
            $protocolo->descripcion_protocolo = $validardatos['descripcion_protocolo'];
            $protocolo->alert_id = $validardatos['alert_id'];
            $protocolo->documento_url = $validardatos['documento_url'];

            $guardado = $protocolo->save();

            return response()->json([
                'success' => 'Protocolo actualizado',
                'data' => $protocolo
            ], 200);
        } else {
            return response()->json([
                'error' => 'Protocolo no encontrado'
            ], 404);
        } 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $protocoloElim = Protocolo::find($id);
        if (!$protocoloElim) {
            return response()->json([
                'error' => 'No se ha encontrado el protocolo con ese ID'
            ], 404);
        } else {
            $protocoloElim->delete();
            return response()->json([
                'success' => 'Protocolo eliminado con éxito.',
                'data' => $protocoloElim
            ], 200);
        }
    }
}
