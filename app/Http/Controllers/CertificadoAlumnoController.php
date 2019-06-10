<?php

namespace App\Http\Controllers;

use App\Certificado_Alumno;
use Illuminate\Http\Request;

class CertificadoAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $certificadoAlumno = Certificado_Alumno::all();

        return response()->json($certificadoAlumno);
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
        $certificadoAlumno = new Certificado_Alumno();
        $certificadoAlumno->save();
        return response()->json($certificadoAlumno);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificado_Alumno  $certificado_alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Certificado_Alumno $certificado_alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificado_Alumno  $certificado_alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificado_Alumno $certificado_alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificado_Alumno  $certificado_alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $certificadoAlumno = Certificado_Alumno::find($id);
        $certificadoAlumno->save();
        return response()->json($certificadoAlumno);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificado_Alumno  $certificado_alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $certificadoAlumno = Certificado_Alumno::find($id);
        $certificadoAlumno->delete();
        return 'Borrado';
    }
}
