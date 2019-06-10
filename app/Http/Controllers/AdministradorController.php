<?php

namespace App\Http\Controllers;

use App\Administrador;
use Illuminate\Http\Request;

class administrador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $administrador = Administrador::all();

        return response()->json($administrador);
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
        $administrador = new Administrador();
        $administrador->rut = $request->rut;
        $administrador->password = $request->password;
        $administrador->nombres = $request->nombres;
        $administrador->apellido_paterno = $request->apellido_paterno;
        $administrador->apellido_materno = $request->apellido_materno;
        $administrador->save();
        return response()->json($administrador);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function show(Administrador $administrador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function edit(Administrador $administrador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $administrador = Administrador::find($id);
        $administrador->rut = $request->rut;
        $administrador->password = $request->password;
        $administrador->nombres = $request->nombres;
        $administrador->apellido_paterno = $request->apellido_paterno;
        $administrador->apellido_materno = $request->apellido_materno;
        $administrador->save();
        return response()->json($administrador);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Administrador  $administrador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $administrador = Administrador::find($id);
        $administrador->delete();
        return "Borrado";
    }
}
