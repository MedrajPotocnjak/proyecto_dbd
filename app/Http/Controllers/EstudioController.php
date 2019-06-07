<?php

namespace App\Http\Controllers;

use App\Estudio;
use Illuminate\Http\Request;

class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estudios=Estudio::all();

        return response()->json($estudios);
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
        $estudio= new Estudio();
        $estudio->area= $request->area;
        $estudio->titulo= $request->titulo;
        $estudio->contenido= $request->contenido;
        $estudio->ruta_estudio= $request->ruta_estudio;
        $estudio->save();
        return response()->json($estudio);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function show(Estudio $estudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudio $estudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $estudio= Estudio::find($id);
        $estudio->area= $request->area;
        $estudio->titulo= $request->titulo;
        $estudio->contenido= $request->contenido;
        $estudio->ruta_estudio= $request->ruta_estudio;
        $estudio->save();
        return response()->json($estudio);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $estudio = Estudio::find($id);
        $estudio->delete();
        return 'Borrado';
    }
}
