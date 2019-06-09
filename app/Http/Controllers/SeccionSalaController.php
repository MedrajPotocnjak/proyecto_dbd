<?php

namespace App\Http\Controllers;

use App\Seccion_Sala;
use Illuminate\Http\Request;

class SeccionSalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seccionSala = Seccion_Sala::all();

        return response()->json($seccionSala);
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
        $seccionSala = new Seccion_Sala();
        $seccionSala->bloque = $request->bloque;
        $seccionSala->save();
        return response()->json($seccionSala);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seccion_Sala  $seccion_sala
     * @return \Illuminate\Http\Response
     */
    public function show(Seccion_Sala $seccion_sala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccion_Sala  $seccion_sala
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion_Sala $seccion_sala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccion_Sala  $seccion_sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $seccionSala = Seccion_Sala::find($id);
        $seccionSala->bloque = $request->bloque;
        $seccionSala->save();
        return response()->json($seccionSala);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion_Sala  $seccion_sala
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $seccionSala = Seccion_Sala::find($id);
        $seccionSala->delete();
        return 'Borrado';
    }
}
