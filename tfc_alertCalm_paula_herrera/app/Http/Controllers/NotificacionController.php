<?php

namespace App\Http\Controllers;
use App\Models\Notificacion;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException; 

class NotificacionController extends Controller
{
    /**
     * Función que muestra todas las notificación de la base de datos.
     */
    public function index()
    {
        $notificaciones = Notificacion::with(['user', 'alerta'])->get();
    
        foreach ($notificaciones as $notificacion) {
            if ($notificacion->user && is_string($notificacion->user->localizacion)) {
                $notificacion->user->localizacion = json_decode($notificacion->user->localizacion);
            }
            if ($notificacion->alerta && is_string($notificacion->alerta->localizacion)) {
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
     * Función que crea una notificación y valida sus campos.
     * Devuelve un json con la información de la notificación creada.
     */
   
    public function store(Request $request)
    {
        try {
            $validardatos = $request->validate([
                'user_id' => 'required|exists:users,id',
                'alert_id' => 'nullable|exists:alertas,id',
                'mensaje' => 'required|string|max:255'
            ]);
    
            $notificacion = new Notificacion();
            $notificacion->user_id = $validardatos['user_id'];
            $notificacion->alert_id = $validardatos['alert_id'] ?? null; // Si no se manda alert_id, se pone null
            $notificacion->mensaje = $validardatos['mensaje'];
            $notificacion->save();
    
            if ($notificacion->user && is_string($notificacion->user->localizacion)) {
                $notificacion->user->localizacion = json_decode($notificacion->user->localizacion);
            }
            if ($notificacion->alerta && is_string($notificacion->alerta->localizacion)) {
                $notificacion->alerta->localizacion = json_decode($notificacion->alerta->localizacion);
            }

            return response()->json([
                'success' => 'Notificación creada con éxito.',
                'data' => $notificacion
            ], 201);
        } catch (ValidationException $e) {
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
     * Función que muestra la notificación buscada por su id.
     * Devuelve un json con la información de la notificación.
     */
    public function show($id)
    {
        // Intentar obtener la notificación con sus relaciones
        $notificacion = Notificacion::with(['user', 'alerta'])->find($id);

        // Verificar si la notificación no fue encontrada
        if (is_null($notificacion)) {
            $notificaciones=Notificacion::all();
            return response()->json([
                'error' => 'Notificación no encontrada.',
                'Notificaciones'=> $notificaciones
            ], 404);
        }

        // Si la notificación fue encontrada, proceder a verificar y decodificar las localizaciones
        if ($notificacion->user && is_string($notificacion->user->localizacion)) {
            $notificacion->user->localizacion = json_decode($notificacion->user->localizacion);
        }
        if ($notificacion->alerta && is_string($notificacion->alerta->localizacion)) {
            $notificacion->alerta->localizacion = json_decode($notificacion->alerta->localizacion);
        }

        // Retornar la respuesta exitosa con la notificación encontrada
        return response()->json([
            'success' => 'Notificación encontrada.',
            'data' => $notificacion
        ], 200);
    }


    /**
     * Función que actualiza una notificación pasandole la respuesta y el id por parámetros.
     * Devuelve un json con la información actualizada o un notificación no encontrada.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $validardatos = $request->validate([
            'user_id' => 'required|exists:users,id',
            'alert_id' => 'nullable|exists:alertas,id',
            'mensaje' => 'required|string|max:255'
        ]);
    
        $notificacion = Notificacion::find($id);
    
        if (!$notificacion) {
            return response()->json([
                'error' => 'Notificación no encontrada.'
            ], 404);
        }
    
        $notificacion->user_id = $validardatos['user_id'];
        $notificacion->alert_id = $validardatos['alert_id'] ?? null;
        $notificacion->mensaje = $validardatos['mensaje'];
        $notificacion->save();
        $notificacion->load(['user', 'alerta']);//actuializa los datos cambidos de user_id y de alerta_id
    
        // Decodificar los campos 'localizacion' si son cadenas JSON
        if ($notificacion->user && is_string($notificacion->user->localizacion)) {
            $notificacion->user->localizacion = json_decode($notificacion->user->localizacion);
        }
        if ($notificacion->alerta && is_string($notificacion->alerta->localizacion)) {
            $notificacion->alerta->localizacion = json_decode($notificacion->alerta->localizacion);
        }
    
        return response()->json([
            'success' => 'Notificación actualizada.',
            'data' => $notificacion
        ], 200);
    }
    

    /**
     * Función que elimina una notificación pasandole el id por parámetros.
     * Devuelve un json con la notificación eliminada.
     */
    public function destroy($id)
    {
        $notificacion = Notificacion::with(['user', 'alerta'])->find($id);

        if (!$notificacion) {
            return response()->json([
                'error' => 'No se ha encontrado id de la notificación.'
            ], 404);
        }

        if ($notificacion->user && is_string($notificacion->user->localizacion)) {
            $notificacion->user->localizacion = json_decode($notificacion->user->localizacion);
        }
        if ($notificacion->alerta && is_string($notificacion->alerta->localizacion)) {
            $notificacion->alerta->localizacion = json_decode($notificacion->alerta->localizacion);
        }

        // Eliminar la notificación
        $notificacion->delete();

        return response()->json([
            'success' => 'Notificación eliminada.',
            'data' => $notificacion
        ], 200);
    }
}
