<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alumnos=Alumno::all();

        return response()->json($alumnos);
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
        $alumno= new Alumno();
        $alumno->rut= $request->rut;
        $alumno->nombre= $request->nombre;
        $alumno->apellido_paterno= $request->apellido_paterno;
        $alumno->apellido_materno= $request->apellido_materno;
        $alumno->nivel= $request->nivel;
        $alumno->ingreso= $request->ingreso;
        $alumno->password= $request->password;
        $alumno->asignaturas_aprobadas= $request->asignaturas_aprobadas;
        $alumno->nas= $request->nas;
        $alumno->ppa= $request->ppa;
        $alumno->nar= $request->nar;
        $alumno->fecha_nacimiento= $request->fecha_nacimiento;
        $alumno->nacionalidad= $request->nacionalidad;
        $alumno->estado_civil= $request->estado_civil;
        $alumno->sexo= $request->sexo;
        $alumno->telefono= $request->telefono;
        $alumno->region= $request->region;
        $alumno->provincia= $request->provincia;
        $alumno->comuna= $request->comuna;
        $alumno->correo= $request->correo;
        $alumno->save();
        return response()->json($alumno);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
