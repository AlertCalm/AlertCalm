<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class UserController extends Controller
{
    /**
     * Función que devuelve todos los usuarios
     */
    public function index()
    {
        $users = User::all()->map(function ($user) {
            if (is_string($user->localizacion)) {
                $user->localizacion = json_decode($user->localizacion, true);
            }
            return $user;
        });
        
        return response()->json([
            'success' => 'Usuarios encontrados',
            'data' => $users
        ], 200);
        
    }

    /**
     * Crear un nuevo user
     */
    public function create()
    {
        // prueba
    }

    /**
     * Funcion que crea un nuevo usuario y lo devuelve
     */
    public function store(Request $request)
    {
        $validardatos=$request->validate([
            'name'=>'required|string|max:55',
            'email' =>'required|string|max:55',
            'password'=>'required|string|max:55',
            'localizacion'=>'nullable|array',
            'localizacion.lat' => 'required|numeric|between:-90,90',
            'localizacion.lng' => 'required|numeric|between:-180,180',
            'edad'=>'nullable|integer',
            'preferencias'=>'nullable|string|max:255',
            'lenguaje'=>'required|string|max:55'
        ]);

        $user = new User();
        $user->name = $validardatos['name'];
        $user->email = $validardatos['email'];
        $user->password = Hash::make($validardatos['password']); // Hash
        $user->localizacion = $validardatos['localizacion'];//guardar como JSON
        $user->edad = $validardatos['edad'];
        $user->preferencias = $validardatos['preferencias'];
        $user->lenguaje = $validardatos['lenguaje'];

        //establecer un valor para el  
        $user->email_verified_at = now();

        $guardado=$user->save();

        if($guardado){
            return response()->json([
                'success' => 'Usuario creado con éxito',
                'data'=>$user
            ], 201);
        }else{
            return response()->json([
                'error' => 'El usuario no se puede crear'
            ], 404);
        }
    }

    /**
     *Función que al poner el id en la url devuelve el usuario encontrado
     */
    public function show(string $id)
    {
        $userBuscar=User::find($id);

        if($userBuscar){
            return response()->json([
                'success'=>'Usuario encontrado',
                 'data'=>$userBuscar], 200);
        }else{
            $usuarios=User::All();
            return response()->json([
                'error'=>'Usuario no encontrado',
                'Lista usuarios'=>$usuarios], 404);
        }
    }

    /**
     * funcion que devuelve lo que el usuario va a ver desde el lado delñ cliente
     */
    public function edit(string $id)
    {
        
        $usuario = User::find($id);
        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }
        return response()->json(['success' => 'Usuario encontrado', 'data' => $usuario], 200);
    
    }

    /**
     * Funcion que actualiza el usuario
     */
    public function update(Request $request, string $id)
    {
        $validardatos=$request->validate([
            'username'=>'required|string|max:55',
            'email' =>'required|string|max:55',
            'password'=>'required|string|max:55',
            'localizacion'=>'nullable|string|max:255',
            'edad'=>'nullable|integer',
            'preferencias'=>'nullable|string|max:255',
            'lenguaje'=>'required|string|max:55'
        ]);

        $userEditar=User::find($id);

        if(!$userEditar){
            return response()->json(['error' => 'Usuario no editado'], 404);
        }

        $userEditar->username=$validardatos['username'];
        $userEditar->email=$validardatos['email'];
        $userEditar->password= Hash::make($validardatos['password']);
        $userEditar->localizacion=$validardatos['localizacion'];
        $userEditar->edad=$validardatos['edad'];
        $userEditar->preferencias=$validardatos['preferencias'];
        $userEditar->lenguaje=$validardatos['lenguaje'];

        $userEditar->save();

        return response()->json([
            'success' => 'Usuario editado',
            'Data'=>$userEditar
            ], 200);

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
