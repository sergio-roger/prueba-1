<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\becas_nivel;

class Becas_nivelController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function consulta()
    { 
        $becas = becas_nivel::all();
        $becas = becas_nivel::where('tipo','C')->get();
        return $becas;
    }

    public function index()
    {
       $becas = becas_nivel::all();
       return $becas;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $becas = new becas_nivel();
        $becas->nombre= $request->nombre;
        $becas->tipo = $request->tipo;
        $becas->estado = $request->estado;
        $becas->fecha_creacion = $request->fecha_creacion;

        $becas->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $becas=becas_nivel::findOrFail($request->id);
        $becas->nombre= $request->nombre;
        $becas->tipo = $request->tipo;
        $becas->estado = $request->estado;
        $becas->fecha_creacion = $request->fecha_creacion;
        $becas->save();
        return $becas;



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $becas=becas_nivel::destroy($request->id);
        return $becas;

    }
//metodo con json para probar si funciona con postman
    public function getBecas_nivel(){
        return response()->json(becas_nivel::all(),200);
    }

    public function getBecas_nivelxid($id){
        $becas = becas_nivel::find($id);
        if(is_null($becas)){
            return response () -> json(['Mensaje'=>'Registro no encontrado'],404);
        } 
        return response ()->json($becas::find($id),200);
    }

    public function insertBecas_nivel(Request $request){
        $becas = becas_nivel::create ($request->all());
        return response($becas,200);
    }

    public function updateBecas_nivel(Request $request,$id){
        $becas = becas_nivel::find($id);
        if (is_null($becas)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
         }
        $becas->update($request->all());
        return response($becas,200);
    }

    public function deleteBecas_nivel($id){
        $becas = becas_nivel::find($id);
        if (is_null($becas)){
            return response()->json(['Mensaje'=>'Registro no encontrado'],404);
         }
         $becas->delete();
         return response()->json(['Mensaje'=>'Registro Eliminado'],200);
    }
}
