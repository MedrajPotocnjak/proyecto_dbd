<?php

namespace App\Http\Controllers;

use App\Mensualidad;
use Illuminate\Http\Request;

class MensualidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mensualidad = Mensualidad::all();

        return response()->json($mensualidad);
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
        $mensualidad = new Mensualidad();
        $mensualidad->numero_mensualidad = $request->numero_mensualidad;
        $mensualidad->costo = $request->costo;
        $mensualidad->save();
        return response()->json($mensualidad);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensualidad  $mensualidad
     * @return \Illuminate\Http\Response
     */
    public function show(Mensualidad $mensualidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensualidad  $mensualidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensualidad $mensualidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensualidad  $mensualidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $mensualidad = Mensualidad::find($id);
        if ($request->numero_mensualidad != NULL){
            $mensualidad->numero_mensualidad = $request->numero_mensualidad;
        }
        if ($request->costo != NULL){
            $mensualidad->costo = $request->costo;
        }
        $mensualidad->save();
        return response()->json($mensualidad);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensualidad  $mensualidad
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mensualidad = Mensualidad::find($id);
        $mensualidad->delete();
        return "Borrado";
    }
}
