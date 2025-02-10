<?php

namespace App\Http\Controllers;
use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notificaciones = Notificacion::all();

        if ($notificaciones->isEmpty()) {
            return response()->json([
                'error' => 'No se han encontrado notificaciones.'
            ], 404);
        } else {
            return response()->json([
                'success' => 'Notificaciones encontradas.',
                'data' => $notificaciones
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validardatos = $request->validate([
            'user_id' => 'required|exists:users,id',
            'alert_id' => 'nullable|exists:alertas,id',
            'mensaje' => 'required|string|max:255'
        ]);

        // Crear la notificación
        $notificacion = new Notificacion();
        $notificacion->user_id = $validardatos['user_id'];
        $notificacion->alert_id = $validardatos['alert_id'] ?? null; // Si no se manda alert_id, se pone null
        $notificacion->mensaje = $validardatos['mensaje'];
        $notificacion->save();

        return response()->json([
            'success' => 'Notificación creada con éxito.',
            'data' => $notificacion
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $notificacion = Notificacion::find($id);

        if ($notificacion) {
            return response()->json([
                'success' => 'Notificación encontrada.',
                'data' => $notificacion
            ], 200);
        } else {
            return response()->json([
                'error' => 'Notificación no encontrada.'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $validardatos = $request->validate([
            'user_id' => 'required|exists:users,id',
            'alert_id' => 'nullable|exists:alertas,id',
            'mensaje' => 'required|string|max:255'
        ]);

        // Buscar la notificación por su ID
        $notificacion = Notificacion::find($id);

        if (!$notificacion) {
            return response()->json([
                'error' => 'Notificación no encontrada.'
            ], 404);
        }

        // Actualizar la notificación
        $notificacion->user_id = $validardatos['user_id'];
        $notificacion->alert_id = $validardatos['alert_id'] ?? null;
        $notificacion->mensaje = $validardatos['mensaje'];
        $notificacion->save();

        return response()->json([
            'success' => 'Notificación actualizada.',
            'data' => $notificacion
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $notificacion = Notificacion::find($id);

        if (!$notificacion) {
            return response()->json([
                'error' => 'No se ha encontrado la notificación.'
            ], 404);
        }

        // Eliminar la notificación
        $notificacion->delete();

        return response()->json([
            'success' => 'Notificación eliminada.',
            'data' => $notificacion
        ], 200);
    }
}
