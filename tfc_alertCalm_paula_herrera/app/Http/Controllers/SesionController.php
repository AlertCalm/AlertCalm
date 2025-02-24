<?php

namespace App\Http\Controllers;
use App\Models\Sesion;
use App\Models\User;
use Carbon\Carbon; 
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesiones = Sesion::with('user')->get();
        if($sesiones->isEmpty()){
            return response()->json([
            'error'=>'No se han encontrado sesiones', 404]);
        }else{
            return response()->json($sesiones, 200);
        }
    }

    
    /**
     * Crear una nueva sesión.
    */
    public function store(Request $request)
    {
        // Validar que el user_id es proporcionado
        $validarDatos = $request->validate([
            'user_id' => 'required|int',
        ]);

        // Verificar si el user_id existe en la base de datos
        $user = User::find($validarDatos['user_id']);
        if (!$user) {
            return response()->json([
                'error' => 'El user_id proporcionado no existe en nuestra base de datos.'
            ], 404);
        }

        // Crear la nueva sesión
        $sesion = Sesion::create([
            'user_id' => $validarDatos['user_id'],
            'ip_address' => $request->ip(), // IP del cliente
            'user_agent' => $request->userAgent(), // Información del navegador
            'payload' => json_encode([]), // Puedes almacenar datos adicionales si es necesario
            'last_activity' => Carbon::now()->timestamp, // Fecha de última actividad
            'inicio_sesion' => Carbon::now(), // Hora de inicio de sesión
            'fin_sesion' => null, // Aún no ha terminado la sesión
        ]);

        // Retornar la respuesta con la sesión creada
        return response()->json($sesion, 201);
    }

     
     
    
    

    /**
     * Obtener una sesión específica.
     */
    public function show($id)
    {
        $sesion = Sesion::with('usuario')->find($id);

        if (!$sesion) {
            return response()->json(['mensaje' => 'Sesión no encontrada'], 404);
        }

        return response()->json($sesion, 200);
    }

    /**
     * Actualizar una sesión.
     */
    public function update(Request $request, $id)
    {
        $sesion = Sesion::find($id);

        if (!$sesion) {
            return response()->json(['mensaje' => 'Sesión no encontrada'], 404);
        }
    
        $validarDatos = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'fin_sesion' => 'nullable|date|after:inicio_sesion',
        ]);
    
        if (isset($validarDatos['user_id'])) {
            $sesion->user_id = $validarDatos['user_id'];
        }
    
        $sesion->fin_sesion = $validarDatos['fin_sesion'] ?? $sesion->fin_sesion;
        $sesion->save();
    
        return response()->json($sesion, 200);
    }

    /**
     * Eliminar una sesión.
     */
    public function destroy($id)
    {
        $sesion = Sesion::find($id);

        if (!$sesion) {
            return response()->json(['mensaje' => 'Sesión no encontrada'], 404);
        }

        $sesion->delete();

        return response()->json(['mensaje' => 'Sesión eliminada correctamente'], 200);
    }
}
