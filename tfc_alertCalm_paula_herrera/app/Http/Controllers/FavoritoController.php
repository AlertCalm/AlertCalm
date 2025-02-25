<?php

namespace App\Http\Controllers;
use App\Models\Favorito;
use App\Models\Meditation;
use App\Models\Music;
use App\Models\User;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favoritos = Favorito::with(['user', 'meditacion', 'musica'])->get();
    
        foreach ($favoritos as $favorito) {
            if ($favorito->user && is_string($favorito->user->localizacion)) {
                $favorito->user->localizacion = json_decode($favorito->user->localizacion);
            }
        }

        if ($favoritos->isEmpty()) {
            return response()->json([
                'error' => 'No se han encontrado favoritos.'
            ], 404);
        }
    
        // Filtrar los datos antes de enviarlos en la respuesta
        $favoritos = $favoritos->map(function ($favorito) {
            if ($favorito->tipo_fav === 'meditation') {
                unset($favorito->musica); // Eliminar el campo "musica" si no es de ese tipo
            } elseif ($favorito->tipo_fav === 'music') {
                unset($favorito->meditacion); // Eliminar el campo "meditacion" si no es de ese tipo
            }
            return $favorito;
        });
    
        return response()->json([
            'success' => 'Favoritos encontrados',
            'data' => $favoritos
        ], 200);
    }
    
    

    /**
     * Show the form for creating a new resource.
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
        try {
            $validardatos = $request->validate([
                'user_id'   => 'required|integer|exists:users,id',
                'tipo_fav'  => 'required|in:music,meditation',
                'item_id'   => 'required|integer', 
            ]);
    
            // Verificar si el item_id existe en la tabla correspondiente según tipo_fav
            if ($validardatos['tipo_fav'] === 'meditation' && !Meditation::find($validardatos['item_id'])) {
                return response()->json([
                    'error' => 'El item_id seleccionado no existe en la tabla de meditaciones.'
                ], 404);
            }
            
            if ($validardatos['tipo_fav'] === 'music' && !Music::find($validardatos['item_id'])) {
                return response()->json([
                    'error' => 'El item_id seleccionado no existe en la tabla de música.'
                ], 404);
            }

            $favorito = Favorito::create($validardatos);
        
            // Incluir los campos de user_id y item_id en la respuesta
            $favoritoData = [
                'user_id'   => $favorito->user_id,
                'tipo_fav'  => $favorito->tipo_fav,
                'item_id'   => $favorito->item_id,
                'user'      => $favorito->user,
            ];
        
            // localizacion para que salga en formato objeto json
            if (isset($favorito->user->localizacion) && is_string($favorito->user->localizacion)) {
                $favorito->user->localizacion = json_decode($favorito->user->localizacion);
            }
    
            // Incluir el item relacionado (meditation o music)
            if ($favorito->tipo_fav === 'music') {
                $favoritoData['item'] = $favorito->musica;
            } elseif ($favorito->tipo_fav === 'meditation') {
                $favoritoData['item'] = $favorito->meditacion;
            }
    
            return response()->json([
                'success' => 'Favorito creado con éxito',
                'data' => $favoritoData
            ], 201);
    
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Datos inválidos.',
                'detalles' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Ocurrió un error al crear el favorito.',
                'detalles' => $e->getMessage()
            ], 500);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $favorito = Favorito::with(['user', 'meditacion', 'musica'])->find($id);
    
        if (!$favorito) {
            return response()->json([
                'error' => 'Favorito no encontrado'
            ], 404);
        }
    
        // Decodificar la localización si es una cadena JSON
        if (isset($favorito->user->localizacion) && is_string($favorito->user->localizacion)) {
            $favorito->user->localizacion = json_decode($favorito->user->localizacion);
        }
    
        // Preparar la respuesta con solo los datos necesarios
        $favoritoData = [
            'id' => $favorito->id,
            'user_id' => $favorito->user_id,
            'item_id' => $favorito->item_id,
            'tipo_fav' => $favorito->tipo_fav, // Incluir el tipo de favorito
            'created_at' => $favorito->created_at,
            'updated_at' => $favorito->updated_at,
            'user' => $favorito->user,
        ];
    
        // Incluir el item correspondiente según el tipo de favorito
        if ($favorito->tipo_fav === 'meditation') {
            $favoritoData['meditacion'] = $favorito->meditacion;
        } elseif ($favorito->tipo_fav === 'music') {
            $favoritoData['musica'] = $favorito->musica;
        }
    
        return response()->json([
            'success' => 'Favorito encontrado',
            'data' => $favoritoData
        ], 200);
    }
    
    

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $favoritos = Favorito::find($id);
        if (!$favoritos) {
            return response()->json(['error' => 'Favorito no encontradO'], 404);
        }
        return response()->json(['success' => 'favorito encontrado', 'data' => $favoritos], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $favorito=Favorito::find($id);
        if($favorito){
            $validardatos=$request->validate([
                'user_id'   => 'required|int|exists:users,id',
                'tipo_fav'  => 'required|in:music,meditation',
                'item_id'   => 'required|int'
            ]);
    
            $favorito->user_id=$validardatos['user_id'];
            $favorito->tipo_fav=$validardatos['tipo_fav'];
            $favorito->item_id=$validardatos['item_id'];
    
            $favorito->save();
            return response()->json([
                'success'=>'Favorito encontrado',
                'data'=>$favorito
            ], 200);
        }else{
            $favoritos=Favorito::all();
            return response()->json([
                'error'=>'No se ha encontardo el favorito para poder editarla.',
                'Lista favoritos'=>$favoritos
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $favoritoElimi = Favorito::find($id);

    if (!$favoritoElimi) {
        $favoritos = Favorito::all(); 
        return response()->json([
            'error' => 'No se ha encontrado el favorito con ese id',
            'lista_favoritos' => $favoritos
        ], 404);
    } else {
        if (isset($favoritoElimi->user->localizacion) && is_string($favoritoElimi->user->localizacion)) {
            $favoritoElimi->user->localizacion = json_decode($favoritoElimi->user->localizacion);
        }
        $favoritoElimi->delete();
        return response()->json([
            'success' => 'Favorito eliminado.',
            'data' => $favoritoElimi
        ], 200);
    }
}

}
