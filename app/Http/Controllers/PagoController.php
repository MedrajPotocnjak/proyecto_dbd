<?php

namespace App\Http\Controllers;

use App\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagos=Pago::all();

        return response()->json($pagos);
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
        $pago= new Pago();
        $pago->rut_alumno= $request->rut_alumno;
        $pago->tipo_pago= $request->tipo_pago;
        $pago->forma_pago= $request->forma_pago;
        $pago->fecha_pago= $request->fecha_pago;
        $pago->save();
        return response()->json($pago);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pago= Pago::find($id);
        if($request->rut_alumno != NULL){
            $pago->rut_alumno= $request->rut_alumno;
        }    
        if ($request->tipo_pago != NULL){
            $pago->tipo_pago= $request->tipo_pago;
        }
        if ($request->forma_pago != NULL){
            $pago->forma_pago= $request->forma_pago;
        }
        if ($request->fecha_pago != NULL){
            $pago->fecha_pago= $request->fecha_pago;
        }
        $pago->save();
        return response()->json($pago);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pago = Pago::find($id);
        $pago->delete();
        return "Borrado";
    }
}
