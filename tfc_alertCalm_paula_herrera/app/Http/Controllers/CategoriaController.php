<?php

namespace App\Http\Controllers;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias=Categoria::all();
        if($categorias->isEmpty()){
            return response()->json([
                'error'=>'No se han encontrado categorias.'], 404);
        }else{
            return response()->json([
                'success' => 'Categorias encontradas',
                'data' => $categorias], 200);
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
            'nombreCategoria'=>'required|string|max:55',
            'descripcion'  => 'required|string|max:255',
            'imagenCategoria'=> 'required|string|max:255'
        ]);

        $categoria = new Categoria();
        $categoria->nombreCategoria=$validardatos['nombreCategoria'];
        $categoria->descripcion=$validardatos['descripcion'];
        $categoria->imagenCategoria=$validardatos['imagenCategoria'];
        

        $guardado=$categoria->save();

        if($guardado){
            return response()->json([
                'success' => 'Categoria creado con éxito',
                'data'=>$categoria
            ], 201);
        }else{
            return response()->json([
                'error' => 'La categoria no se puede crear'
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria=Categoria::find($id);
        if($categoria){
            return response()->json(
                ['success'=>'Categoria encontrada',
                'data'=>$categoria], 200);
        }else{
            $categorias=Categoria::All();
            return response()->json(
                ['error'=>'Categoria no encontrada',
                'Lista categorias'=>$categorias], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['error' => 'Categoria no encontrada'], 404);
        }
        return response()->json(['success' => 'Categoria encontrado', 'data' => $categoria], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $categoria=Categoria::find($id);
    if($categoria){
        $validardatos=$request->validate([
            'nombreCategoria'=>'required|string|max:55',
            'descripcion'  => 'required|string|max:255',
            'imagenCategoria'=> 'required|string|max:255'
        ]);

        $categoria->nombreCategoria=$validardatos['nombreCategoria'];
        $categoria->descripcion=$validardatos['descripcion'];
        $categoria->imagenCategoria=$validardatos['imagenCategoria'];
        

        $guardado=$categoria->save();

        return response()->json([
            'success'=>'Categoría actualizada',
            'data'=>$categoria
        ],200);
    }else{
        $categorias=Categoria::all();
        return response()->json([
            'error'=>'No se ha podido actualizar la categoria',
            'lista Categorías'=>$categorias
        ], 404);
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $categoriaElim=Categoria::find($id);
        if(!$categoriaElim){
            $categorias=Categoria::all();
            return response()->json([
                'error'=>'No se ha encontrado la categoria con ese id',
                'lista Categoria'=>$categorias
            ], 404);
        }else{
            $categoriaElim->delete();
            return response()->json([
                'success'=>'Categoria eliminada.',
                'data'=>$categoriaElim
            ],200);
        }
    }
}
