<?php

namespace App\Http\Controllers;
use App\Models\Sesion;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesiones = Sesion::with('usuario')->get();
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
        $validarDatos = $request->validate([
            'user_id'      => 'required|int',
            'inicio_sesion' => 'required|date',
            'fin_sesion'   => 'nullable|date|after:inicio_sesion',
        ]);

         // Verificar si el user_id existe en la base de datos
         $user = User::find($validarDatos['user_id']);
         if (!$user) {
             return response()->json([
                 'error' => 'El user_id proporcionado no existe en nuestra base de datos.'
             ], 404);
         }



        $sesion = Sesion::create([
            'user_id'       => $validarDatos['user_id'],
            'token_sesion'  => Str::random(60),//genera un token aleatorio
            'inicio_sesion' => $validarDatos['inicio_sesion'],
            'fin_sesion'    => $validarDatos['fin_sesion'] ?? null,
        ]);

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
