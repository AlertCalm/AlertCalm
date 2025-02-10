<?php

namespace App\Http\Controllers;
use App\Models\Alerta;
use Illuminate\Http\Request;

class AlertaController extends Controller
{
    /**
     * Función que devuelve todas las alertas
     */
    public function index()
    {
        $alertas=Alerta::all();
        if($alertas->isEmpty()){
            return response()->json([
                'error'=>'No se han encontrado alertas.'], 404);
        }else{
            return response()->json([
                'success' => 'Alertas encontradas',
                'data' => $alertas], 200);
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
     * Función que devuelve y crea alertas, validando sus campos
     */
    public function store(Request $request)
    {
        $validardatos=$request->validate([
            'titulo'       => 'required|string|max:55',
            'descripcion'  => 'required|string|max:255',
            'tipo'         => 'required|in:inundacion,terremoto,incendio,otros', 
            'localizacion' => 'nullable|array',
            'localizacion.lat' => 'required|numeric|between:-90,90',
            'localizacion.lng' => 'required|numeric|between:-180,180',
            'peligro'      => 'nullable|in:baja,media,alta'
        ]);

        $alerta = new Alerta();
        $alerta->titulo=$validardatos['titulo'];
        $alerta->descripcion=$validardatos['descripcion'];
        $alerta->tipo=$validardatos['tipo'];
        $alerta->localizacion = json_encode($validardatos['localizacion']); // Guardar como JSON
        $alerta->peligro=$validardatos['peligro'];

        $guardado=$alerta->save();

        if($guardado){
            return response()->json([
                'success' => 'Alerta creado con éxito',
                'data'=>$alerta
            ], 201);
        }else{
            return response()->json([
                'error' => 'La alerta no se puede crear'
            ], 404);
        }
    }

    /**
     * Funcioón que devuelve una alerta si tiene determinado id
     */
    public function show(string $id)
    {
        $alertaid=Alerta::find($id);
        if($alertaid){
            return response()->json(
                ['success'=>'Alerta encontrada',
                'data'=>$alertaid], 200);
        }else{
            $alertas=Alerta::All();
            return response()->json(
                ['error'=>'Alerta no encontrada',
                'Lista alertas'=>$alertas], 404);
        }
    }

    /**
     * Función que devuelve una alerta si el id coincide 
     */
    public function edit(string $id)
    {
        $alertaid = Alerta::find($id);
        if (!$alertaid) {
            return response()->json(['error' => 'Alerta no encontrada'], 404);
        }
        return response()->json(['success' => 'Alerta encontrado', 'data' => $alertaid], 200);
    } 

    /**
     * Función que devuelve una alerta actualizada
     */
    public function update(Request $request, string $id)
    {
        $alertaid=Alerta::find($id);
        if($alertaid){
            $validardatos=$request->validate([
                'titulo'       => 'required|string|max:55',
                'descripcion'  => 'required|string|max:255',
                'tipo'         => 'required|in:inundacion,terremoto,incendio,otros', 
                'localizacion' => 'nullable|array',
                'localizacion.lat' => 'required|numeric|between:-90,90',
                'localizacion.lng' => 'required|numeric|between:-180,180',
                'peligro'      => 'nullable|in:baja,media,alta'
            ]);
            $alertaid->titulo=$validardatos['titulo'];
            $alertaid->descripcion=$validardatos['descripcion'];
            $alertaid->tipo=$validardatos['tipo'];
            $alertaid->localizacion = json_encode($validardatos['localizacion']);
            $alertaid->peligro=$validardatos['peligro'];
            $alertaid->save();
            return response()->json([
                'success'=>'Alerta encontrada',
                'data'=>$alertaid
            ], 200);
        }else{
            $alertas=Alerta::all();
            return response()->json([
                'error'=>'No se ha encontardo la alerta para poder editarla.',
                'Lista alertas'=>$alertas
            ]);
        }
    }

    /**
     * Función que elimina una alerta si coincide con el id introducido
     */
    public function destroy(string $id)
    {
        $alertaElimi=Alerta::find($id);
        if(!$alertaElimi){
            $alertas=Alerta::all();
            return response()->json([
                'error'=>'No se ha encontrado la alerta con ese id',
                'lista Alertas'=>$alertas
            ], 404);
        }else{
            $alertaElimi->delete();
            return response()->json([
                'success'=>'Alerta eliminada.',
                'data'=>$alertaElimi
            ],200);
        }
    }
}
