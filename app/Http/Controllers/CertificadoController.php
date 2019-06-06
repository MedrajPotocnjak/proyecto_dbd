<?php

namespace App\Http\Controllers;

use App\Certificado;
use Illuminate\Http\Request;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $certificado = Certificado::all();

        return response()->json($certificado);
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
        $certificado = new Certificado();
        $certificado->codigo_verificacion = $request->codigo_verificacion;
        $certificado->contenido = $request->contenido;
        $certificado->fecha = $request->fecha;
        $certificado->ruta_formato = $request->ruta_formato;
        $certificado->save();
        return response()->json($certificado);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show(Certificado $certificado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificado $certificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $certificado = Certificado::find('$id');
        $certificado->codigo_verificacion = $request->codigo_verificacion;
        $certificado->contenido = $request->contenido;
        $certificado->fecha = $request->fecha;
        $certificado->ruta_formato = $request->ruta_formato;
        $certificado->save();
        return response()->json($certificado);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $certificado = Certificado::find('$id');
        $certificado->delete();
        return "Borrado";
    }
}
