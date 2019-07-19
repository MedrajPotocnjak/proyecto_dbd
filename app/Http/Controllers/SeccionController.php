<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\Alumno;
use App\Seccion_Sala;
use App\Seccion_Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seccion = Seccion::all();

        return response()->json($seccion);
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
        $seccion = new Seccion();
        $seccion->nombre = $request->nombre;
        $seccion->cupos = $request->cupos;
        $seccion->tipos = $request->tipo;
        $seccion->save();
        return response()->json($seccion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function show(Seccion $seccion)
    {
        //
    }

	public function getHorarios($id) {
		$seccion_salas=Seccion_Sala::all()->where('codigo_seccion','=',$id);
		return $seccion_salas->pluck('bloque');

	}
	
	public function addHorario($id,Request $request) {
		$seccion_sala= new Seccion_Sala;
		$seccion_sala->codigo_seccion=$id;
		$seccion_sala->codigo_sala=$request->codigo_sala;
		$seccion_sala->bloque=$request->bloque;
		$seccion_sala->save();
        return "Bloque agregado ".$request->bloque." para seccion ".$id;
	}
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion $seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $seccion = Seccion::find($id);
        if ($request->nombre != NULL){
            $seccion->nombre = $request->nombre;
        }
        if ($request->cupos != NULL){
            $seccion->cupos = $request->cupos;
        }
        if ($request->tipos != NULL){
            $seccion->tipos = $request->tipo;
        }
        $seccion->save();
        return response()->json($seccion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $seccion = Seccion::find($id);
        $seccion->delete();
        return 'Borrado';
    }

    public function obtenerAlumnos($id){
        $seccion = Seccion::find($id);
        $secciones_alumnos = collect(Seccion_Alumno::all()->where('codigo','=',$id));
        /*
        $alumnos = new Collection;
        foreach ($secciones_alumnos as $seccion_alumno){
            $alumno = Alumno::All()->where('rut_alumno','=',$seccion_alumno->rut);
            $alumnos->push($alumno);
        }
        $alumnos->all();
        $collection = new Collection;
        foreach ($alumnos as $alumno) {
            $collection = collect(Seccion_Alumno::all()->where('rut_alumno','=',$alumno->rut));
        }*/
        return $secciones_alumnos;
    }
}
