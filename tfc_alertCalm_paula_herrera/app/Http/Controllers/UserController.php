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
        try {
            // Validar los datos
            $validardatos = $request->validate([
                'name' => 'required|string|max:55',
                'email' => [
                    'required',
                    'string',
                    'max:255',
                    'unique:users,email',
                    'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', // Expresión regular para el correo
                ],
               'password' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
                'localizacion' => 'nullable|array',
                'localizacion.lat' => 'required_with:localizacion|numeric|between:-90,90',
                'localizacion.lng' => 'required_with:localizacion|numeric|between:-180,180',
                'edad' => 'nullable|integer',
                'preferencias' => 'nullable|string|max:255',
                'lenguaje' => 'required|string|max:55'
            ]);
    
            // Crear usuario
            $user = new User();
            $user->name = $validardatos['name'];
            $user->email = $validardatos['email'];
            $user->password = Hash::make($validardatos['password']); // Hash de la contraseña
            $user->localizacion = $validardatos['localizacion'] ?? null; // Guardar como JSON
            $user->edad = $validardatos['edad'] ?? null;
            $user->preferencias = $validardatos['preferencias'] ?? null;
            $user->lenguaje = $validardatos['lenguaje'];
            $user->email_verified_at = now();
    
            if ($user->save()) {
                return response()->json([
                    'success' => 'Usuario creado con éxito',
                    'data' => $user
                ], 201);
            } else {
                return response()->json([
                    'error' => 'El usuario no se pudo crear'
                ], 500);
            }
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Error de validación',
                'detalles' => $e->errors() // Laravel devuelve los errores en un array asociativo(mirar en resources/lang/es para que lo devuelva en español)
            ], 422);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en la base de datos',
                'mensaje' => 'El email ya está registrado o hay un problema con la inserción'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error interno del servidor',
                'mensaje' => $e->getMessage()
            ], 500);
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
        try {
            // Buscar el usuario
            $userEditar = User::find($id);
        
            if (!$userEditar) {
                return response()->json(['error' => 'Usuario no encontrado'], 404);
            }
        
            // Validar los datos
            $validardatos = $request->validate([
                'name' => 'required|string|max:55',
                'email' => 'required|string|max:55|email', //no se permitirá modificarlo
                'password' => 'nullable|string|max:55', 
                'localizacion' => 'nullable|array',
                'localizacion.lat' => 'required_with:localizacion|numeric|between:-90,90',
                'localizacion.lng' => 'required_with:localizacion|numeric|between:-180,180',
                'edad' => 'nullable|integer',
                'preferencias' => 'nullable|string|max:255',
                'lenguaje' => 'required|string|max:55'
            ]);
        
            // Si el correo electrónico se intenta cambiar, se lanza un error
            if ($validardatos['email'] !== $userEditar->email) {
                return response()->json([
                    'error' => 'El correo electrónico no puede ser cambiado.'
                ], 400);
            }
        
            //Actualizar datos
            $userEditar->name = $validardatos['name'];
            $userEditar->email = $userEditar->email; 
            if (!empty($validardatos['password'])) {
                $userEditar->password = Hash::make($validardatos['password']);
            }
            $userEditar->localizacion = $validardatos['localizacion'] ?? $userEditar->localizacion; // Si no se pasa, conserva el anterior
            $userEditar->edad = $validardatos['edad'] ?? $userEditar->edad;
            $userEditar->preferencias = $validardatos['preferencias'] ?? $userEditar->preferencias;
            $userEditar->lenguaje = $validardatos['lenguaje'];
        
            // Guardar los cambios
            $userEditar->save();
        
            return response()->json([
                'success' => 'Usuario editado correctamente',
                'data' => $userEditar
            ], 200);
        
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Error de validación',
                'detalles' => $e->errors() // Laravel devuelve los errores en un array asociativo
            ], 422);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en la base de datos',
                'mensaje' => 'Hubo un problema con la actualización de los datos'
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error interno del servidor',
                'mensaje' => $e->getMessage()
            ], 500);
        }
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
