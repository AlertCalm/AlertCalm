<?php

namespace App\Http\Controllers;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException; 

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notificaciones = Notificacion::with(['user', 'alerta'])->get();

        // Convertir las localizaciones a objetos si son cadenas JSON
        foreach ($notificaciones as $notificacion) {
            if (is_string($notificacion->user->localizacion)) {
                $notificacion->user->localizacion = json_decode($notificacion->user->localizacion);
            }
            if (is_string($notificacion->alerta->localizacion)) {
                $notificacion->alerta->localizacion = json_decode($notificacion->alerta->localizacion);
            } 
        }
      
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
        try {
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
        } catch (ValidationException $e) {
            // Manejar errores de validación
            return response()->json([
                'error' => 'Error de validación',
                'detalles' => $e->errors()
            ], 422);
        } catch (QueryException $e) {
            // Manejar errores de base de datos
            return response()->json([
                'error' => 'Error en la base de datos',
                'mensaje' => 'Hubo un problema al guardar la notificación.'
            ], 500);
        } catch (\Exception $e) {
            // Manejar otros errores inesperados
            return response()->json([
                'error' => 'Error interno del servidor',
                'mensaje' => $e->getMessage()
            ], 500);
        }
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
