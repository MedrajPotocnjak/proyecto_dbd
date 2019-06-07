<?php

namespace App\Http\Controllers;

use App\Solicitud_Alumno;
use Illuminate\Http\Request;

class SolicitudAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $solicitudAlumno = Solicitud_Alumno::all();

        return response()->json($solicitudAlumno); 
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
        $solicitudAlumno = new Solicitud_Alumno();
        $solicitudAlumno->save();
        return response()->json($solicitudAlumno);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Solicitud_Alumno  $solicitud_alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud_Alumno $solicitud_alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Solicitud_Alumno  $solicitud_alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud_Alumno $solicitud_alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Solicitud_Alumno  $solicitud_alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $solicitudAlumno = Solicitud_Alumno::find($id);
        $solicitudAlumno->save();
        return response()->json($solicitudAlumno);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Solicitud_Alumno  $solicitud_alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $solicitudAlumno = Solicitud_Alumno::find($id);
        $solicitudAlumno->delete();
        return 'Borrado';
    }
}
