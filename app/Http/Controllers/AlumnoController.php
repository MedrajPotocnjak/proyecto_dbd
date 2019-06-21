<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Certificado;
use App\Certificado_Alumno;
use App\Solicitud_Alumno;
use App\Solicitud;
use App\Mensaje;
use App\Profesor;
use App\Mensaje_Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

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

    public function createMensaje(Request $request, $id){
        $mensaje = new Mensaje;
        $alumno=Alumno::find($id);
        $rut=$alumno->rut;
        $mensaje->asunto= $request->asunto;
        $mensaje->contenido= $request->contenido;
        $mensaje->fecha = $request->fecha;
        $idp = $request->id_profesor;
        $profesor=Profesor::find($idp);
        $rut_profesor =  $profesor->rut;
        $mensaje->rut_profesor= $rut_profesor;
        $mensaje->save();
        $mensaje_alumno = new Mensaje_Alumno;
        $mensaje_alumno->codigo_mensaje = $mensaje->id;
        $mensaje_alumno->rut_alumno = $rut;
        $mensaje_alumno->save();

        return response()->json($mensaje);
    
    }

    public function getMensaje($id){
        $collection= new Collection;
        $alumno=Alumno::find($id);
        $rut=$alumno->rut;
        $mensaje_alumnos=Mensaje_Alumno::all()->where('rut_alumno','=',$rut);
        $id_mensajes = $mensaje_alumnos->pluck('codigo_mensaje');
        $collection=collect(Mensaje::find($id_mensajes));
        return $collection->all();
    }

    
    public function getCertificados($id){
        $collection= new Collection;
        $alumno=Alumno::find($id);
        $rut=$alumno->rut;
        $certificado_alumnos= Certificado_Alumno::all()->where('rut_alumno','=',$rut);
        $folio_certificados = $certificado_alumnos->pluck('folio_certificado');
        $collection=collect(Certificado::find($folio_certificados));
        return $collection->all();
    }
    
    public function createCertificado(Request $request, $id){
        $certificado = new Certificado;
        $alumno=Alumno::find($id);
        $rut=$alumno->rut;
        $certificado->codigo_verificacion=$request->codigo_verificacion;
        $certificado->contenido=$request->contenido;
        $certificado->fecha =$request->fecha;
        $certificado->ruta_formato =$request->ruta_formato;
        $certificado->save();
        $certificado_alumno = new Certificado_Alumno;
        $certificado_alumno->folio_certificado =$certificado->folio;
        $certificado_alumno->rut_alumno= $rut;
        $certificado_alumno->save();
        return response()->json($certificado);

    }
    
    public function createSolicitud(Request $request, $id){
        $solicitud = new Solicitud;
        $alumno=Alumno::find($id);
        $rut=$alumno->rut;
        $solicitud->contenido= $request->contenido;
        $solicitud->ruta_formato= $request->ruta_formato;
        $solicitud->save();
        $solicitud_alumno = new Solicitud_Alumno;
        $solicitud_alumno->rut_alumno=$rut;
        $solicitud_alumno->codigo_solicitud = $solicitud->codigo;
        $solicitud_alumno->save();
        return response()->json($solicitud);
 
    }

    public function getSolicitud($id){
        $collection= new Collection;
        $alumno=Alumno::find($id);
        $rut=$alumno->rut;
        $certificado_alumnos= Solicitud_Alumno::all()->where('rut_alumno','=',$rut);
        $codigo_solicitudes = $certificado_alumnos->pluck('codigo_solicitud');
        $collection=collect(Solicitud::find($codigo_solicitudes));
        return $collection->all();
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
    public function update(Request $request, $id)
    {
        //
        $alumno= Alumno::find($id);
        if($request->rut != NULL){
            $alumno->rut = $request->rut;
        }
        if($request->nombre != NULL){
            $alumno->nombre = $request->nombre;
        }
        if($request->apellido_paterno != NULL){
            $alumno->apellido_paterno = $request->apellido_paterno;
        }
        if($request->apellido_materno != NULL){
            $alumno->apellido_materno = $request->apellido_materno;
        }
        if($request->nivel != NULL){
            $alumno->nivel = $request->nivel;
        }
        if($request->ingreso != NULL){
            $alumno->ingreso = $request->ingreso;
        }
        if($request->password != NULL){
            $alumno->password = $request->password;
        }
        if($request->asignaturas_aprobadas != NULL){
            $alumno->asignaturas_aprobadas = $request->asignaturas_aprobadas;
        }
        if($request->nas != NULL){
            $alumno->nas = $request->nas;
        }
        if($request->ppa != NULL){
            $alumno->ppa = $request->ppas;
        }
        if($request->nar != NULL){
            $alumno->nar = $request->nar;
        }
        if($request->fecha_nacimiento != NULL){
            $alumno->fecha_nacimiento = $request->fecha_nacimiento;
        }
        if($request->nacionalidad != NULL){
            $alumno->nacionalidad = $request->nacionalidad;
        }
        if($request->estado_civil != NULL){
            $alumno->estado_civil = $request->estado_civil;
        }
        if($request->sexo != NULL){
            $alumno->sexo = $request->sexo;
        }
        if($request->telefono != NULL){
            $alumno->telefono = $request->telefono;
        }
        if($request->region != NULL){
            $alumno->region = $request->region;
        }
        if($request->provincia != NULL){
            $alumno->provincia = $request->provincia;
        }
        if($request->comuna != NULL){
            $alumno->comuna = $request->comuna;
        }
        if($request->correo != NULL){
            $alumno->correo = $request->correo;
        }
        $alumno->save();
        return response()->json($alumno);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $alumno = Alumno::find($id);
        $alumno->delete();
        return 'Borrado';
    }
}
