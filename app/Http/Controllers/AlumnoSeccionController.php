<?php

namespace App\Http\Controllers;

use App\Seccion_Alumno;
use Illuminate\Http\Request;

class AlumnoSeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $alumnoSeccion = Seccion_Alumno::all();
        return response()->json($alumnoSeccion);
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
        $alumnoSeccion = new Seccion_Alumno();
        $alumnoSeccion->codigo_seccion = $request->codigo_seccion;
        $alumnoSeccion->rut = $request->rut;
        $alumnoSeccion->aprobado = $request->aprobado;
        $alumnoSeccion->promedio = $request->promedio;
        $alumnoSeccion->nota_p1 = $request->nota_p1;
        $alumnoSeccion->nota_p2 = $request->nota_p2;
        $alumnoSeccion->nota_p3 = $request->nota_p3;
        $alumnoSeccion->nota_c1 = $request->nota_c1;
        $alumnoSeccion->nota_c2 = $request->nota_c2;
        $alumnoSeccion->nota_c3 = $request->nota_c3;
        $alumnoSeccion->estado_cursado = $request->estado_cursado;
        $alumnoSeccion->save();
        return response()->json($alumnoSeccion);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seccion_Alumno  $alumno_seccion
     * @return \Illuminate\Http\Response
     */
    public function show(Seccion_Alumno $alumno_seccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccion_Alumno  $alumno_seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion_Alumno $alumno_seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccion_Alumno  $alumno_seccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $alumnoSeccion = Seccion_Alumno::find($id);
        if ($request->codigo_seccion != NULL){
            $alumnoSeccion->codigo_seccion = $request->codigo_seccion;
        }
        if ($request->rut != NULL){
            $alumnoSeccion->rut = $request->rut;
        }
        if ($request->aprobado != NULL){
            $alumnoSeccion->aprobado = $request->aprobado;
        }
        if ($request->promedio != NULL){
            $alumnoSeccion->promedio = $request->promedio;
        }
        if ($request->nota_p1 != NULL){
            $alumnoSeccion->nota_p1 = $request->nota_p1;
        }
        if ($request->nota_p2 != NULL){
            $alumnoSeccion->nota_p2 = $request->nota_p2;
        }
        if ($request->nota_p3 != NULL){
            $alumnoSeccion->nota_p3 = $request->nota_p3;
        }
        if ($request->nota_c1 != NULL){
            $alumnoSeccion->nota_c1 = $request->nota_c1;
        }
        if ($request->nota_c2 != NULL){
            $alumnoSeccion->nota_c2 = $request->nota_c2;
        }
        if ($request->nota_c3 != NULL){
            $alumnoSeccion->nota_c3 = $request->nota_c3;
        }
        if ($request->estado_cursado != NULL){
            $alumnoSeccion->estado_cursado = $request->estado_cursado;
        }
        $alumnoSeccion->save();
        return response()->json($alumnoSeccion);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion_Alumno  $alumno_seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $alumnoSeccion = Seccion_Alumno::find($id);
        $alumnoSeccion ->delete();
        return "Borrado";
    }
}
