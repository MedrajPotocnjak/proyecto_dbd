<?php

namespace App\Http\Controllers;

use App\Profesor;
use App\Mensaje;
use App\Seccion;
use App\Seccion_Alumno;
use App\Mensaje_Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profesores=Profesor::all();

        return response()->json($profesores);
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
        $profesor= new Profesor();
        $profesor->rut= $request->rut;
        $profesor->nombres= $request->nombres;
        $profesor->apellido_paterno= $request->apellido_paterno;
        $profesor->apellido_materno= $request->apellido_materno;
        $profesor->password= $request->password;
        $profesor->area= $request->area;
        $profesor->fecha_nacimiento= $request->fecha_nacimiento;
        $profesor->nacionalidad= $request->nacionalidad;
        $profesor->sexo= $request->sexo;
        $profesor->telefono= $request->telefono;
        $profesor->region= $request->region;
        $profesor->provincia= $request->provincia;
        $profesor->comuna= $request->comuna;
        $profesor->correo= $request->correo;
        $profesor->save();
        return response()->json($profesor);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Profesor $profesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $profesor= Profesor::find($id);
        if ($request->rut != NULL){
            $profesor->rut= $request->rut;
        }
        if ($request->nombres != NULL){
            $profesor->nombres= $request->nombres;
        }
        if ($request->apellido_paterno != NULL){
            $profesor->apellido_paterno= $request->apellido_paterno;
        }
        if ($request->apellido_materno != NULL){
            $profesor->apellido_materno= $request->apellido_materno;
        }
        if ($request->password != NULL){
            $profesor->password= $request->password;
        }
        if ($request->area != NULL){
            $profesor->area= $request->area;
        }
        if ($request->fecha_nacimiento != NULL){
            $profesor->fecha_nacimiento= $request->fecha_nacimiento;
        }
        if ($request->nacionalidad != NULL){
            $profesor->nacionalidad= $request->nacionalidad;
        }
        if ($request->sexo != NULL){
            $profesor->sexo= $request->sexo;
        }
        if ($request->telefono != NULL){
            $profesor->telefono= $request->telefono;
        }
        if ($request->region != NULL){
            $profesor->region= $request->region;
        }
        if ($request->provincia != NULL){
            $profesor->provincia= $request->provincia;
        }
        if ($request->comuna != NULL){
            $profesor->comuna= $request->comuna;
        }
        if ($request->correo != NULL){
            $profesor->correo= $request->correo;
        }
        $profesor->save();
        return response()->json($profesor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $profesor = Profesor::find($id);
        $profesor->delete();
        return 'Borrado';
    }

    public function verMensajes($id){
        $coleccion = new Collection;
        $coleccion = collect(Mensaje::all()->where('rut_profesor','=',$id));
        $mensajes = $coleccion->sortBy('fecha');
        return response()->json($mensajes->pluck('fecha','asunto','contenido')->all());
    }

    public function crearMensaje(Request $request, $id){
        $mensaje = new Mensaje;

        $profesor = Profesor::find($id);

        $mensaje->rut_profesor = $profesor->rut;
        $mensaje->asunto= $request->asunto;
        $mensaje->contenido= $request->contenido;
        $mensaje->fecha = $request->fecha;

        $seccion = Seccion::find($rut);

        $seccion_alumno = Seccion_Alumno::find($seccion->codigo_seccion);
        $rut_a = $seccion_alumno->rut; 

        $mensaje->save();

        $mensaje_alumno = new Mensaje_Alumno;

        $mensaje_alumno->rut_alumno = $rut_a;
        $mensaje_alumno->codigo_mensaje = $mensaje->id;

        $mensaje_alumno->save();
        return response()->json($mensaje);
    }
}
