<?php

namespace App\Http\Controllers;

use App\asignatura;
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
     * @param  \App\asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(asignatura $asignatura)
    {
        //Buscar por id .w.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(asignatura $asignatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asignatura $asignatura)
    {
        // Recibir todos los datos 'dato'=> 'required' 
        //Guardar en el historial -> Id del que hace la modificacion, se crea
        //Retornar mensajes?
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(asignatura $asignatura)
    {
        //encontrar cosa por su ID
        //$cosa -> delete();
    }
}
//Importar el elemento de la migracion correspondiente $horario = horario::all();
//Where ("id_algo",request(??)) -> where (n_cositas", >=, $algo que se pide)->Get(); Return $Cosita_pedida;
//Usar los triggers para poder guardar cosas en tablas intermedias 6v6 