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
        $factory->define(Mensaje_Alumno::class, function (Faker $faker));
        $mensajes_alumnos = Mensaje_Alumno::all();

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
        $mensajes_alumnos = new Mensaje_Alumno();
        $mensajes_alumnos->codigo_mensaje = $request->codigo_mensaje;
        $mensajes_alumnos->rut_alumno = $request->rut_alumno; 
        $mensajes_alumnos->save();
        return response()->json($mensajes_alumnos);
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
    public function update(Request $request, $id)
    {
        //
        $mensajes_alumnos = Mensaje_Alumno::find($id);
        if($request->codigo_mensaje != NULL){
            $mensajes_alumnos->codigo_mensaje= $request->codigo_mensaje;
        }
        if($request->rut_alumno != NULL){
            $mensajes_alumnos->rut_alumno = $request->rut_alumno;
        }
        $mensajes_alumnos->save();
        return response()->json($mensajes_alumnos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mensaje_Alumno  $mensaje_alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mensajes_alumnos = Mensaje_Alumno::find($id);
        $mensajes_alumnos->delete();
        return "Borrado";
    }
}
