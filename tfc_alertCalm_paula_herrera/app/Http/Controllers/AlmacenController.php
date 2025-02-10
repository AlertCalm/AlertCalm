<?php

namespace App\Http\Controllers;
use App\Models\Almacen;
use Illuminate\Http\Request;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $almacen = Almacen::all();
        if ($almacen->isEmpty()) {
            return response()->json([
                'error' => 'No se han encontrado contraseñas.'
            ], 404);
        } else {
            return response()->json([
                'success' => 'Contraseñas encontradas',
                'data' => $almacen
            ], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validardatos = $request->validate([
            'password' => 'required|string|max:55'
        ]);

        $almacen = new Almacen();
        // Usamos Hash::make() para encriptar la contraseña
        $almacen->password = Hash::make($validardatos['password']);

        $guardado = $almacen->save();

        if ($guardado) {
            return response()->json([
                'success' => 'Contraseña creada con éxito',
                'data' => $almacen
            ], 201);
        } else {
            return response()->json([
                'error' => 'La contraseña no se pudo crear'
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $password = Almacen::find($id);
        if ($password) {
            $validardatos = $request->validate([
                'password' => 'required|string|max:55',
            ]);
            $password->password = Hash::make($validardatos['password']);
            $password->save();

            return response()->json([
                'success' => 'Contraseña actualizada',
                'data' => $password
            ], 200);
        } else {
            $passwords = Almacen::all();
            return response()->json([
                'error' => 'No se ha encontrado la contraseña para poder editarla.',
                'Lista de contraseñas' => $passwords
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $passElimi = Almacen::find($id);
        if (!$passElimi) {
            $pass = Almacen::all();
            return response()->json([
                'error' => 'No se ha encontrado la contraseña con ese ID',
                'Lista de contraseñas' => $pass
            ], 404);
        } else {
            $passElimi->delete();
            return response()->json([
                'success' => 'Contraseña eliminada.',
                'data' => $passElimi
            ], 200);
        }
    }
}