<?php

namespace App\Http\Controllers;

use App\Mensaje_Alumno;
use Illuminate\Http\Request;

class MensajeAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mensajes_alumnos=Mensaje_Alumno::all();

        return response()->json($mensajes_alumnos);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mensaje_Alumno  $mensaje_alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Mensaje_Alumno $mensaje_alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mensaje_Alumno  $mensaje_alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Mensaje_Alumno $mensaje_alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mensaje_Alumno  $mensaje_alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mensaje_Alumno $mensaje_alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensaje_Alumno  $mensaje_alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mensaje_Alumno $mensaje_alumno)
    {
        //
    }
}
