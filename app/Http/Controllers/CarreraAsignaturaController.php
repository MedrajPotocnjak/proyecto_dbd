<?php

namespace App\Http\Controllers;

use App\Carrera_Asignatura;
use Illuminate\Http\Request;

class CarreraAsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carrera_asignaturas=Carrera_Asignatura::all();

        return response()->json($carrera_asignaturas);
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
        $carrera_asignaturas = new Carrera_Asignatura();
        $carrera_asignaturas->codigo_carrera= $request->codigo_carrera;
        $carrera_asignaturas->codigo_asignatura= $request->codigo_asignatura;
        $carrera_asignaturas->save();
        return response()->json($carrera_asignaturas);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrera_Asignatura  $carrera_asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera_Asignatura $carrera_asignatura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrera_Asignatura  $carrera_asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera_Asignatura $carrera_asignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrera_Asignatura  $carrera_asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $carrera_asignaturas = Carrera_Asignatura::find($id);
        if($request->codigo_carrera != NULL){
            $carrera_asignaturas->codigo_carrera= $request->codigo_carrera;
        }
        if($request->codigo_asignatura != NULL){
            $carrera_asignaturas->codigo_asignatura= $request->codigo_asignatura;
        }
        $carrera_asignaturas->save();
        return response()->json($carrera_asignaturas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrera_Asignatura  $carrera_asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $carrera_asignaturas = Carrera_Asignatura::find($id);
        $carrera_asignaturas->delete();
        return 'Borrado';
    }
}
