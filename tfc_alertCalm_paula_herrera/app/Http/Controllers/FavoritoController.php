<?php

namespace App\Http\Controllers;
use App\Models\Favorito;
use App\Models\User;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favoritos=Favorito::all();
        if($favoritos->isEmpty()){
            return response()->json([
                'error'=>'No se han encontrado favoritos.'], 404);
        }else{
            return response()->json([
                'success' => 'Favoritos encontradas',
                'data' => $favoritos], 200);
        }
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
        $validardatos=$request->validate([
            'user_id'   => 'required|int',
            'tipo_fav'  => 'required|in:music,meditation',
            'item_id'   => 'required|int'
        ]);

        // Verificar si el user_id existe en la base de datos
        $user = User::find($validardatos['user_id']);
        if (!$user) {
            return response()->json([
                'error' => 'El user_id proporcionado no existe en nuestra base de datos.'
            ], 404);
        }


        $favorito = new Favorito();
        $favorito->user_id=$validardatos['user_id'];
        $favorito->tipo_fav=$validardatos['tipo_fav'];
        $favorito->item_id=$validardatos['item_id'];

        $guardado=$favorito->save();

        if($guardado){
            return response()->json([
                'success' => 'Favorito creado con éxito',
                'data'=>$favorito
            ], 201);
        }else{
            return response()->json([
                'error' => 'El favorito no se puede crear'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $favorito=Favorito::find($id);
        if($favorito){
            return response()->json(
                ['success'=>'Favorito encontrada',
                'data'=>$favorito], 200);
        }else{
            $favoritos=Favorito::All();
            return response()->json(
                ['error'=>'Favorito no encontrada',
                'Lista favoritoS'=>$favoritos], 404);
        }
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
        $favoritoElimi=Favorito::find($id);
        if(!$favoritoElimi){
            $favoritos=Favorito::all();
            return response()->json([
                'error'=>'No se ha encontrado el favorito con ese id',
                'lista favoritos'=>$favoritos
            ], 404);
        }else{
            $favoritoElimi->delete();
            return response()->json([
                'success'=>'Favorito eliminado.',
                'data'=>$favoritoElimi
            ],200);
        }
    }
}
