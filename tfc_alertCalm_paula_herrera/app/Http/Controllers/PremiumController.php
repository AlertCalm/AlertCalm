<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PremiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $premium = Premium::all();
        if ($premium->isEmpty()) {
            return response()->json([
                'error' => 'No se han encontrado suscripciones premium.'
            ], 404);
        } else {
            return response()->json([
                'success' => 'Suscripciones premium encontradas',
                'data' => $premium
            ], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lógica para mostrar formulario de creación si es necesario.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'activo' => 'required|boolean',
            'fecha_inicio' => 'required|date',
            'fecha_expiracion' => 'nullable|date'
        ]);

        $premium = new Premium();
        $premium->user_id = $validatedData['user_id'];
        $premium->activo = $validatedData['activo'];
        $premium->fecha_inicio = $validatedData['fecha_inicio'];
        $premium->fecha_expiracion = $validatedData['fecha_expiracion'] ?? null;

        $guardado = $premium->save();

        if ($guardado) {
            return response()->json([
                'success' => 'Suscripción premium creada con éxito.',
                'data' => $premium
            ], 201);
        } else {
            return response()->json([
                'error' => 'Hubo un problema al crear la suscripción premium.'
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $premium = Premium::find($id);
        if ($premium) {
            return response()->json([
                'success' => 'Suscripción premium encontrada',
                'data' => $premium
            ], 200);
        } else {
            return response()->json([
                'error' => 'Suscripción premium no encontrada'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $premium = Premium::find($id);
        if (!$premium) {
            return response()->json(['error' => 'Suscripción premium no encontrada'], 404);
        }
        return response()->json(['success' => 'Suscripción premium encontrada', 'data' => $premium], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $premium = Premium::find($id);
        if ($premium) {
            $validatedData = $request->validate([
                'user_id' => 'required|exists:users,id',
                'activo' => 'required|boolean',
                'fecha_inicio' => 'required|date',
                'fecha_expiracion' => 'nullable|date'
            ]);

            $premium->user_id = $validatedData['user_id'];
            $premium->activo = $validatedData['activo'];
            $premium->fecha_inicio = $validatedData['fecha_inicio'];
            $premium->fecha_expiracion = $validatedData['fecha_expiracion'] ?? null;

            $guardado = $premium->save();

            return response()->json([
                'success' => 'Suscripción premium actualizada',
                'data' => $premium
            ], 200);
        } else {
            return response()->json([
                'error' => 'Suscripción premium no encontrada'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $premium = Premium::find($id);
        if (!$premium) {
            return response()->json([
                'error' => 'No se ha encontrado la suscripción premium con ese ID'
            ], 404);
        } else {
            $premium->delete();
            return response()->json([
                'success' => 'Suscripción premium eliminada.',
                'data' => $premium
            ], 200);
        }
    }
}
