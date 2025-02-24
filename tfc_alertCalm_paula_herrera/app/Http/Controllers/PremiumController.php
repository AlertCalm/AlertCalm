<?php

namespace App\Http\Controllers;
use App\Models\Premium;
use App\Models\User;
use Illuminate\Http\Request;

class PremiumController extends Controller
{
    /**
     *Función que muestra todas las suscripcionesde la base de datos.
     */
    public function index()
    {
        $premiums = Premium::with('user')->get();
        foreach ($premiums as $premium) {
            if ($premium->user && is_string($premium->user->localizacion)) {
                $premium->user->localizacion = json_decode($premium->user->localizacion);
            }
        }
    
        if ($premiums->isEmpty()) {
            return response()->json([
                'error' => 'No se han encontrado suscripciones premium.'
            ], 404);
        } else {
            return response()->json([
                'success' => 'Suscripciones premium encontradas',
                'data' => $premiums
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
     * Función que crea una suscripción premium y valida sus campos.
     * Devuelve un json con la información de la suscripción premium  creada.
     */
    public function store(Request $request)
    {
        try {
            // Validación de los datos del request
            $validardatos = $request->validate([
                'user_id' => 'required|int|exists:users,id', 
                'activo' => 'required|boolean',  // Verificamos que 'activo' sea un booleano
            ]);
    
            // Verificar si el user_id existe en la base de datos
            $user = User::find($validardatos['user_id']);
            if (!$user) {
                return response()->json([
                    'error' => 'El user_id proporcionado no existe en nuestra base de datos.'
                ], 404);
            }
    
            $premium = new Premium();
            $premium->user_id = $validardatos['user_id'];
            $premium->activo = $validardatos['activo'];
    
            // Establecer la fecha de inicio como la fecha actual
            $premium->fecha_inicio = \Carbon\Carbon::now();
            $premium->fecha_expiracion = \Carbon\Carbon::now()->addYear();
            $guardado = $premium->save();
    
            // Si la suscripción se guardó correctamente
            if ($guardado) {
                return response()->json([
                    'success' => 'Suscripción premium creada con éxito.',
                    'data' => $premium->load(['user']) 
                ], 201);
            } else {
                return response()->json([
                    'error' => 'Hubo un problema al crear la suscripción premium.'
                ], 400);
            }
    
        } catch (ValidationException $e) {
            //errores de validación
            return response()->json([
                'error' => 'Error de validación',
                'detalles' => $e->errors()
            ], 422);
        } catch (QueryException $e) {
            // Capturamos errores de base de datos
            return response()->json([
                'error' => 'Error en la base de datos',
                'mensaje' => 'Hubo un problema al guardar la suscripción.'
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error interno del servidor',
                'mensaje' => $e->getMessage()
            ], 500);
        }
    }
    
    


    /**
    * Función que muestra la suscripción premium buscada por su id.
     * Devuelve un json con la información de la suscripción.
     */
    public function show(string $id)
    {
        $premium = Premium::with('user')->find($id);
        
        if ($premium) {
            // Decodificar el campo 'localizacion' si está presente
            if ($premium->user && is_string($premium->user->localizacion)) {
                $premium->user->localizacion = json_decode($premium->user->localizacion);
            }

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
     *
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
     * Función que actualiza una suscripción premium pasandole la respuesta y el id por parámetros.
     * Devuelve un json con la información actualizada.
     */
    public function update(Request $request, string $id)
    {
        try {
            $premium = Premium::with('user')->find($id);
            if (!$premium) {
                return response()->json([
                    'error' => 'Suscripción premium no encontrada'
                ], 404);
            }

            if ($premium->user && is_string($premium->user->localizacion)) {
                $premium->user->localizacion = json_decode($premium->user->localizacion);
            }

            $validardatos = $request->validate([
                'user_id' => 'required|int|exists:users,id',
                'activo' => 'required|boolean',
            ]);

            $user = User::find($validardatos['user_id']);
            if (!$user) {
                return response()->json([
                    'error' => 'El user_id proporcionado no existe en nuestra base de datos.'
                ], 404);
            }

            $premium->user_id = $validardatos['user_id'];
            $premium->activo = $validardatos['activo'];

            $guardado = $premium->save();

            return response()->json([
                'success' => 'Suscripción premium actualizada',
                'data' => $premium->load(['user'])
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Error de validación',
                'detalles' => $e->errors()
            ], 422);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en la base de datos',
                'mensaje' => 'Hubo un problema al actualizar la suscripción.'
            ], 500);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error interno del servidor',
                'mensaje' => $e->getMessage()
            ], 500);
        }
    }
    
    /**
     * Función que elimina una suscripción premium pasandole el id por parámetros.
     */
    public function destroy(string $id)
    {
        $premium = Premium::with('user')->find($id);
        if (!$premium) {
            return response()->json([
                'error' => 'No se ha encontrado la suscripción premium con ese ID'
            ], 404);
        } else {
            // Eliminar la suscripción premium
            $premium->delete();
    
            return response()->json([
                'success' => 'Suscripción premium eliminada.',
                'id' => $premium->id // Devolvemos solo el ID de la suscripción eliminada
            ], 200);
        }
    }
}    
