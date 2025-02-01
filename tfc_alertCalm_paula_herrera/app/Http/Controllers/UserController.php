<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Función que devuelve todos los usuarios
     */
    public function index()
    {
        $usuarios=User::all();
        if($usuarios->isEmpty()){
            return response()->json([
                'error'=>'No se han encontrado usuarios.'], 404);
        }else{
            return response()->json([
                'success' => 'Usuarios encontrados',
                'data' => $usuarios], 200);
        }
    }

    /**
     * Crear un nuevo user
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Editar usuario
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Función que elimina un usuario, pasandole su id por parámetros
     */
    public function destroy(string $id)
    {
        $userEliminado=User::find($id);

        if($userEliminado){
            $userEliminado->delete();
            return response()->json([
                'success'=>'Usuaro eliminado',
                 'data'=>$userEliminado], 200);
        }else{
            $usuarios=User::All();
            return response()->json([
                'error'=>'Usario no encontrado',
                'usuarios'=>$usuarios], 404);
        }
    }
}
