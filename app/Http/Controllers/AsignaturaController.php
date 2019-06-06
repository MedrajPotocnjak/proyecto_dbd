<?php

namespace App\Http\Controllers;

use App\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asignaturas=Asignatura::all();

        return response()->json($asignaturas);
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
        $asignatura= new Asignatura();
        $asignatura->nombre= $request->nombre;
        $asignatura->jornada= $request->jornada;
        $asignatura->asistencia_minima= $request->asistencia_minima;
        $asignatura->ponderacion= $request->ponderacion;
        $asignatura->nivel= $request->nivel;
        $asignatura->horas_teoria= $request->horas_teoria;
        $asignatura->horas_laboratorio= $request->horas_laboratorio;
        $asignatura->horas_ejercicios= $request->horas_ejercicios;
        $asignatura->version_plan_estudios= $request->version_plan_estudios;
        $asignatura->save();
        return response()->json($asignatura);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        //Buscar por id .w.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignatura $asignatura)
    {
        // Recibir todos los datos 'dato'=> 'required' 
        //Guardar en el historial -> Id del que hace la modificacion, se crea
        //Retornar mensajes?
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        //encontrar cosa por su ID
        //$cosa -> delete();
    }
}
//Importar el elemento de la migracion correspondiente $horario = horario::all();
//Where ("id_algo",request(??)) -> where (n_cositas", >=, $algo que se pide)->Get(); Return $Cosita_pedida;
//Usar los triggers para poder guardar cosas en tablas intermedias 6v6 