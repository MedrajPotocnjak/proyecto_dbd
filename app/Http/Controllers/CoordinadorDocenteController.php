<?php

namespace App\Http\Controllers;

use App\CoordinadorDocente;
use Illuminate\Http\Request;

class CoordinadorDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coordinador = CoordinadorDocente::all();

        return response()->json($coordinador);
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
        //
        $coordinador = new CoordinadorDocente();
        if($request->rut != NULL){
            $coordinador->rut= $request->rut;
        }
        if($request->password != NULL){
            $coordinador->password= $request->password;
        }
        if($request->nombres != NULL){
            $coordinador->nombres= $request->nombres;
        }
        if($request->apellido_paterno != NULL){
            $coordinador->apellido_paterno= $request->apellido_paterno;
        }
        if($request->apellido_materno != NULL){
            $coordinador->apellido_materno= $request->apellido_materno;
        }
        $coordinador->save();
        return response()->json($coordinador);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CoordinadorDocente  $coordinador_docente
     * @return \Illuminate\Http\Response
     */
    public function show(CoordinadorDocente $coordinador_docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CoordinadorDocente  $coordinador_docente
     * @return \Illuminate\Http\Response
     */
    public function edit(CoordinadorDocente $coordinador_docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CoordinadorDocente  $coordinador_docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $coordinador = CoordinadorDocente::find($id);
        $coordinador->rut = $request->rut;
        $coordinador->password = $request->password;
        $coordinador->nombres = $request->nombres;
        $coordinador->apellido_paterno = $request->apellido_paterno;
        $coordinador->apellido_materno = $request->apellido_materno;
        $coordinador->save();
        return response()->json($coordinador);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CoordinadorDocente  $coordinador_docente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coordinador = CoordinadorDocente::find($id);
        $coordinador->delete();
        return "Borrado";
    }
}
