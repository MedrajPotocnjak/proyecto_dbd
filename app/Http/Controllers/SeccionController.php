<?php

namespace App\Http\Controllers;

use App\Seccion;
use App\Seccion_Sala;
use Illuminate\Http\Request;

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
        $seccion->tipos = $reques->tipo;
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
		
		return Seccion_Sala::all()->where('codigo_seccion','=',$id);

	}
	
	public function addHorario($id,Request $request) {
		$seccion_sala= new Seccion_Sala;
		$seccion_sala->codigo_seccion=$id;
		$seccion_sala->codigo_sala=$request->codigo_sala;
		$seccion_sala->bloque=$request->bloque;
		$seccion_sala->save();
        return response()->json($seccion_sala);
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
            $seccion->tipos = $reques->tipo;
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
}
