<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $carreras=Carrera::all();

        return response()->json($carreras);
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
        $carrera= new Carrera();
        $carrera->nombre= $request->nombre;
        $carrera->asignaturas_plan= $request->asignaturas_plan;
        $carrera->cantidad_alumnos= $request->cantidad_alumnos;
        $carrera->arancel= $request->arancel;
        $carrera->save();
        return response()->json($carrera);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit(Carrera $carrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $carrera= Carrera::find($id);
        $carrera->nombre= $request->nombre;
        $carrera->asignaturas_plan= $request->asignaturas_plan;
        $carrera->cantidad_alumnos= $request->cantidad_alumnos;
        $carrera->arancel= $request->arancel;
        $carrera->save();
        return response()->json($carrera);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $carrera = Carrera::find($id);
        $carrera->delete();
        return 'Borrado';
    }
}
