<?php

namespace App\Http\Controllers;


use App\Asignatura;
use App\Seccion;
use App\Seccion_Sala;
use App\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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
        //Buscar por id .w.+
    }

	public function getHorarios($id) {
		$collection= new Collection;

		$secciones=Seccion::all()->where('codigo_asignatura','=',$id);
		foreach ($secciones as $seccion) {
			$collection=collect(Seccion_Sala::all()->where('codigo_seccion','=',$seccion->codigo));
		}
		return $collection;
	}
	public function getSecciones($id) {

        $secciones=Seccion::all()->where('codigo_asignatura','=',$id);
        $retorno = new Collection;
        foreach ($secciones as $se) {
            $retorno->push($se);
        }

		return $retorno;
	}
	public function addSeccion($id,Request $request) {
        $seccion = New Seccion;
        $seccion->rut_profesor = $request->rut_profesor;
        $seccion->codigo_asignatura = $id;
        $seccion->nombre = $request->nombre;
        $seccion->cupos = $request->cupos;
        $seccion->tipo = $request->tipo;
        $seccion->save();
        return $seccion;
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
    public function update(Request $request, $id)
    {
        // Recibir todos los datos 'dato'=> 'required' 
        //Guardar en el historial -> Id del que hace la modificacion, se crea
        //Retornar mensajes?
        $asignatura= Asignatura::find($id);
        if($request->nombre != NULL){
            $asignatura->nombre = $request->nombre;
        }
        if($request->jornada != NULL){
            $asignatura->jornada = $request->jornada;
        }
        if($request->asistencia_minima != NULL){
            $asignatura->asistencia_minima = $request->asistencia_minima;
        }
        if($request->ponderacion != NULL){
            $asignatura->ponderacion = $request->ponderacion;
        }
        if($request->nivel != NULL){
            $asignatura->nivel = $request->nivel;
        }
        if($request->horas_teoria != NULL){
            $asignatura->horas_teoria = $request->horas_teoria;
        }
        if($request->horas_ejercicios != NULL){
            $asignatura->horas_ejercicios = $request->horas_ejercicios;
        }
        if($request->horas_laboratorio != NULL){
            $asignatura->horas_laboratorio = $request->horas_laboratorio;
        }
        if($request->version_plan_estudios != NULL){
            $asignatura->version_plan_estudios = $request->version_plan_estudios;
        }
        $asignatura->save();
        return response()->json($asignatura);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //encontrar cosa por su ID
        //$cosa -> delete();
        $asignatura = Asignatura::find($id);
        $asignatura->delete();
        return 'Borrado';
    }
}
//Importar el elemento de la migracion correspondiente $horario = horario::all();
//Where ("id_algo",request(??)) -> where (n_cositas", >=, $algo que se pide)->Get(); Return $Cosita_pedida;
//Usar los triggers para poder guardar cosas en tablas intermedias 6v6 