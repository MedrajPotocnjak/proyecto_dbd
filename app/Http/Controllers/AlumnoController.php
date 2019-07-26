<?php

namespace App\Http\Controllers;
use App\Mail\NotificacionLoa;
use App\Carrera;
use App\Carrera_Asignatura;
use App\Alumno;
use App\Certificado;
use App\Certificado_Alumno;
use App\Seccion_Alumno;
use App\Seccion;
use App\Seccion_Sala;
use App\Sala;
use App\Solicitud_Alumno;
use App\Solicitud;
use App\Mensaje;
use App\Profesor;
use App\Asignatura;
use App\Mensaje_Alumno;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;

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
        $alumno->nivel= 1;
        $alumno->ingreso=$request->ingreso;
        $alumno->password= $request->password;
        $alumno->asignaturas_aprobadas= 0;
        $alumno->nas= "1.0";
        $alumno->ppa= "1.0";
        $alumno->nar= "1.0";
        $alumno->fecha_nacimiento= $request->fecha_nacimiento;
        $alumno->nacionalidad= $request->nacionalidad;
        $alumno->estado_civil= $request->estado_civil;
        $alumno->sexo= $request->sexo;
        $alumno->telefono= $request->telefono;
        $alumno->region= $request->region;
        $alumno->provincia= $request->provincia;
		$alumno->codigo_carrera= $request->codigo_carrera;
        $alumno->comuna= $request->comuna;
        $alumno->correo= $request->correo;
        $alumno->save();
        return response()->json($alumno);
    }

    public function createMensaje(Request $request, $id){
        $mensaje = new Mensaje;
        $alumno=Alumno::find($id);
        $rut=$alumno->rut;

        //Informacion Alumno
        $correoAlumno = $alumno->correo;
        $nombreAlumno = $alumno->nombre;
        $appAlumno = $alumno->apellido_paterno;
        $apmAlumno = $alumno->apellido_materno;

        //Datos Mensaje
        $asuntoMensaje = $request->asunto;
        $contenidoMensaje= $request->contenido;
        $mensaje->asunto= $asuntoMensaje;
        $mensaje->contenido= $contenidoMensaje;
        
        $rutProfesor = $request->rut_profesor;
        $profe = Profesor::all()->where('rut','=',$rutProfesor);
        $listaCorreo = $profe->pluck('correo');
        $listaNombre = $profe->pluck('nombres');
        $listaAPP = $profe->pluck('apellido_paterno');
        $listaAPM = $profe->pluck('apellido_materno');

        //DatosProfesor
        $cooreoProfesor = $listaCorreo[0];
        $nombreProfesor = $listaNombre[0];
        $appProfesor = $listaAPP[0];
        $apmProfesor = $listaAPM[0];

        $mensaje->rut_profesor= $rutProfesor;
        $mensaje->save();
        $mensaje_alumno = new Mensaje_Alumno;
        $mensaje_alumno->codigo_mensaje = $mensaje->id;
        $mensaje_alumno->rut_alumno = $rut;
        $mensaje_alumno->save();


        

        Mail::to($cooreoProfesor)->send(new NotificacionLoa($correoAlumno,$cooreoProfesor,$asuntoMensaje,$contenidoMensaje,$nombreAlumno,$nombreProfesor, $appAlumno,$appProfesor,$apmAlumno,$apmProfesor));
        
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

	public function ramosTomables($id) {
		$alumno=Alumno::find($id);
        $rut=$alumno->rut;
        $nivel=$alumno->nivel;

		$secciones_alumno_cursando=collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursado','=','s'));
		$secciones_alumno_no_cursando=collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursado','=','n'));
		$carrera=Carrera::find($alumno->codigo_carrera);
		$carrera_asignatura=Carrera_Asignatura::all()->where('codigo_carrera','=',$carrera->codigo);
		$asignaturas=new Collection;
		foreach ($carrera_asignatura as $ca) {
			$asignatura=Asignatura::find($ca->codigo_asignatura);
			$secciones=Seccion::all()->where('codigo_asignatura','=',$asignatura->codigo);
            $ramo_tomable=true;
            if ($asignatura->nivel < $nivel){
                $ramo_tomable=false;
            }
            else{
                foreach ($secciones as $seccion) {
                    $secciones_alumnos=Seccion_Alumno::all()->where('rut_alumno','=',$rut);
                    foreach ($secciones_alumnos as $sa) {
                        if ($sa->aprobado==1 || $sa->estado_cursado=='s') {
                            $ramo_tomable=false;
                        }
                        
                    }
                }
            }
			if ($ramo_tomable) {
				$asignaturas->push($asignatura);
			}
		}
		return $asignaturas;
	}
    
	public function verHorarioArray($id) {
		$alumno=Alumno::find($id);
        $rut=$alumno->rut;
		$bloques=new Collection;
		$secciones_alumno_cursando=collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursado','=','s'));
		foreach ($secciones_alumno_cursando as $sa) {
			
			$seccion=Seccion::find($sa->codigo_seccion);
			$seccion_salas=Seccion_Sala::all()->where('codigo_seccion','=',$seccion->codigo);
			$bloques_seccion=$seccion_salas->pluck('bloque');
			
			$bloques=$bloques->concat($bloques_seccion);
		}
		return $bloques;
	}
	
	
	public function sugerirRamos($id) {
		$alumno=Alumno::find($id);
        $rut=$alumno->rut;
        $nivel=$alumno->nivel;
		$secciones_alumno_cursando=collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursado','=','s'));
		$secciones_alumno_no_cursando=collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursado','=','n'));
		$carrera=Carrera::find($alumno->codigo_carrera);
		$carrera_asignatura=Carrera_Asignatura::all()->where('codigo_carrera','=',$carrera->codigo);
		$asignaturas=new Collection;
		foreach ($carrera_asignatura as $ca) {
			$asignatura=Asignatura::find($ca->codigo_asignatura);
			$secciones=Seccion::all()->where('codigo_asignatura','=',$asignatura->codigo);
            $ramo_tomable=true;
            if ($asignatura->nivel < $nivel){
                $ramo_tomable=false;
            }
            else{
                foreach ($secciones as $seccion) {
                    $secciones_alumnos=Seccion_Alumno::all()->where('rut_alumno','=',$rut);
                    foreach ($secciones_alumnos as $sa) {
                        if ($sa->aprobado==1 || $sa->estado_cursado=='s') {
                            $ramo_tomable=false;
                        }
                        
                    }
                }
            }
			if ($ramo_tomable) {
				$asignaturas->push($asignatura);
			}
		}
		$insertable=true;
		$t_tomado=false;
		$l_tomado=false;
		$e_tomado=false;
		$secciones=new Collection;
		foreach ($asignaturas as $asign) {
			$secciones_asign=Seccion::all()->where('codigo_asignatura','=',$asign->codigo);
			
			foreach ($secciones_asign as $sec) {
				if ($t_tomado && $l_tomado && $e_tomado) {
					break;
				}
				$seccion_salas=Seccion_Sala::all()->where('codigo_seccion','=',$sec->codigo);
				$bloques=$seccion_salas->pluck('bloque');
				$t_tomado=false;
				$l_tomado=false;
				$e_tomado=false;
				$insertable=true;
				foreach ($secciones as $seccion_ingresada) {
					$mi_seccion_salas=Seccion_Sala::all()->where('codigo_seccion','=',$seccion_ingresada->codigo);
					$estos_bloques=$mi_seccion_salas->pluck('bloque');
					$interseccion=$bloques->intersect($estos_bloques);
					if (!$interseccion->isEmpty()) {
						$insertable=false;
					}
				}
				if ($insertable) { 
					if ($sec->tipo=='l' && $l_tomado==false){
						$secciones->push($sec);
						$l_tomado=true;
					}
					if ($sec->tipo=='e' && $e_tomado==false){
						$secciones->push($sec);
						$e_tomado=true;
					}
					if ($sec->tipo=='t' && $t_tomado==false){
						$secciones->push($sec);
						$t_tomado=true;
					}
				}
			}
		}
		$secciones_a_tomar=$secciones->unique();
		$nota = "1.0";
        foreach ($secciones_a_tomar as $seccion){
            $alumnoSeccion = Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('codigo_seccion','=',$seccion)->first();
            if ($alumnoSeccion == null){
                $seccion_alumno=new Seccion_Alumno;
                $seccion_alumno->rut_alumno= $rut;
                $seccion_alumno->codigo_seccion= $seccion->codigo;
                $seccion_alumno->aprobado = 0;
                $seccion_alumno->nota_p1= $nota;
                $seccion_alumno->nota_p2= $nota;
                $seccion_alumno->nota_p3= $nota;
                $seccion_alumno->nota_c1= $nota;
                $seccion_alumno->nota_c2= $nota;
                $seccion_alumno->nota_c3= $nota;
                $seccion_alumno->promedio= $nota;
                $seccion_alumno->estado_cursado = "s";
                $seccion_alumno->save();
            }
		}
		return $secciones_a_tomar;
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

    public function getPosibleAsignatura($id){
       // $collection= new Collection;
        $alumno=Alumno::find($id);
        $nivel=$alumno->nivel;
        $asignaturas= Asignatura::all()->where('nivel','>=',$nivel);
        $retorno = new Collection;
        foreach ($asignaturas as $se) {
            $retorno->push($se);
        }
		return $retorno;
    }

    public function getPosibleAsignatura2($id){
        // $collection= new Collection;
        $alumno=Alumno::find($id);
        $nivel=$alumno->nivel + 1;
        $asignaturas= Asignatura::all()->where('nivel','=',$nivel);
        return $asignaturas->all();
    }

    public function getSecciones($id){
        $alumno=Alumno::find($id);
        $nivel=$alumno->nivel;
        $asignaturas= Asignatura::all()->where('nivel','=',$nivel);
        $codigo_secciones = $asignaturas->pluck('codigo');
        $collection= new Collection;
        $collection=collect(Seccion::find($codigo_secciones));

        return $collection->all();
    }

	public function getSeccionesCursando($id){
        $alumno=Alumno::find($id);
		$rut=$alumno->rut;
        $secciones_alumnos=collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursado','=','s'));
		$codigo_secciones=$secciones_alumnos->pluck('codigo_seccion');
		$secciones_cursando=collect(Seccion::find($codigo_secciones));
		$salida = new Collection;
		foreach ($secciones_cursando as $seccion) {
			$profesor=Profesor::all()->where('rut','=',$seccion->rut_profesor)->first();
			$asignatura=Asignatura::find($seccion->codigo_asignatura);
			$nombre_profesor=$profesor->nombres.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno;
			$nombreCompleto=$asignatura->nombre.'-'.$seccion->nombre.'-'.strtoupper($seccion->tipo).' | '.$nombre_profesor;
			$salida->push(['codigo'=>$seccion->codigo,'nombre'=>$nombreCompleto]);
		}
        return $salida;
    }
	
	public function verCalificacionesOld($id){
        $alumno=Alumno::find($id);
		$rut=$alumno->rut;
        $secciones_alumnos=collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursado','=','n'));
		$colors=["teal accent-3","purple darken-1","red darken-4","lime darken-1","blue-grey darken-1","brown lighten-1","deep-purple","cyan","light-blue","light-green accent-3"];
		$colorpos=0;
		$color='red';
		$salida = new Collection;
		foreach ($secciones_alumnos as $seccion_alumno) {
			$seccion=Seccion::find($seccion_alumno->codigo_seccion)->first();
			$asignatura=Asignatura::find($seccion->codigo_asignatura);
			$profesor=Profesor::all()->where('rut','=',$seccion->rut_profesor)->first();
			$nombre_profesor=$profesor->nombres.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno;
			if ($seccion_alumno->aprobado==0) {
				$aprobado='no';
				$color='red';
			}
			else {
				$aprobado='sí';
				$color='green';
			}
			
			$salida->push(['nombre' => $asignatura->nombre.'-'.$seccion->nombre.'-'.strtoupper($seccion->tipo), 'profesor' => $nombre_profesor, 'color' =>$color
																															   , 'P1' =>$seccion_alumno->nota_p1
																															   , 'P2' =>$seccion_alumno->nota_p2
																															   , 'P3' =>$seccion_alumno->nota_p3
																															   , 'C1' =>$seccion_alumno->nota_c1
																															   , 'C2' =>$seccion_alumno->nota_c2
																															   , 'C3' =>$seccion_alumno->nota_c3
																															   , 'promedio' => $seccion_alumno->promedio
																															   , 'aprobado' => $aprobado
																															   ]);
			$colorpos=$colorpos+1;
		}
        return $salida;
    }
	
	public function verCalificaciones($id){
        $alumno=Alumno::find($id);
		$rut=$alumno->rut;
        $secciones_alumnos= collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursado','=','s'));
		$colors=["teal accent-3","purple darken-1","red darken-4","lime darken-1","blue-grey darken-1","brown lighten-1","deep-purple","cyan","light-blue","light-green accent-3"];
		$colorpos=0;
		$salida = new Collection;
		foreach ($secciones_alumnos as $seccion_alumno) {
			$seccion=Seccion::find($seccion_alumno->codigo_seccion);
			$profesor=Profesor::all()->where('rut','=',$seccion->rut_profesor)->first();
			$asignatura=Asignatura::find($seccion->codigo_asignatura);
			$nombre_profesor=$profesor->nombres.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno;
			$salida->push(['nombre' => $asignatura->nombre.'-'.$seccion->nombre.'-'.strtoupper($seccion->tipo), 'profesor' => $nombre_profesor, 'aprobado' =>$seccion_alumno->aprobado, 'color' =>$colors[$colorpos]
																															   , 'P1' =>$seccion_alumno->nota_p1
																															   , 'P2' =>$seccion_alumno->nota_p2
																															   , 'P3' =>$seccion_alumno->nota_p3
																															   , 'C1' =>$seccion_alumno->nota_c1
																															   , 'C2' =>$seccion_alumno->nota_c2
																															   , 'C3' =>$seccion_alumno->nota_c3
																															   , 'promedio' => $seccion_alumno->promedio
																															   ]);
			$colorpos=$colorpos+1;
		}
        return $salida;
    }

   public function inscribirAsignatura(Request $request,$id){
        $alumno=Alumno::find($id);
        $nivelA=$alumno->nivel;
        $rut = $alumno->rut;
        $codigo_asignatura = $request->asignatura;
        $codigo_seccion = $request->seccion;
        $nota = "1.0";
        $asignatura= Asignatura::find($codigo_asignatura);
        if($asignatura->nivel >= $nivelA){
            $seccion = Seccion::find($codigo_seccion);

            $alumnoSeccion = Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('codigo_seccion','=',$seccion)->first();
            print $alumnoSeccion;
            if ($alumnoSeccion == null){
                $seccion_alumno=new Seccion_Alumno;
                $seccion_alumno->rut_alumno= $rut;
                $seccion_alumno->codigo_seccion= $seccion->codigo;
                $seccion_alumno->aprobado = 0;
                $seccion_alumno->nota_p1= $nota;
                $seccion_alumno->nota_p2= $nota;
                $seccion_alumno->nota_p3= $nota;
                $seccion_alumno->nota_c1= $nota;
                $seccion_alumno->nota_c2= $nota;
                $seccion_alumno->nota_c3= $nota;
                $seccion_alumno->promedio= $nota;
                $seccion_alumno->estado_cursado = "s";
                $seccion_alumno->save();
                return "Asignatura inscrita correctamente";
            }
        }
        return "No se pudo inscribir la asignatura";

    }
	public function desinscribirAsignatura($id,$seccion) {
		$alumno=Alumno::find($id);
		$rut=$alumno->rut;
		$alumnoSeccion = Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('codigo_seccion','=',$seccion)->first();
        $alumnoSeccion ->delete();
        return "Seccion ".$seccion." ha sido desinscrita";
	}
    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumno=Alumno::find($id);
		return $alumno;
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
		if($request->targeta_credito != NULL){
            $alumno->targeta_credito = $request->targeta_credito;
        }
		if($request->fecha_caducidad != NULL){
            $alumno->fecha_caducidad = $request->fecha_caducidad;
        }
		if($request->cvc != NULL){
            $alumno->cvc = $request->cvc;
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

    public function verHorario($id){
		$profe=Alumno::find($id);
		$rut=$profe->rut;
        $todas_seccionesAlumno = collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursado','=','s'))->pluck('codigo_seccion');
		
		$todas_secciones=Seccion::all()->find($todas_seccionesAlumno);
        $salida= [];
		$colors=["teal accent-3","purple darken-1","red darken-4","lime darken-1","blue-grey darken-1","brown lighten-1","deep-purple","cyan","light-blue","light-green accent-3"];
		$colorpos=0;
		for ($i=0;$i<6;$i++) {
			for ($k=0;$k<8;$k++) {
				$salida[$i][$k]=collect(['color','sala'])->combine(['blue lighten-5','- -']);;
			}
		}
		foreach ($todas_secciones as $seccion) {
			$codigo=$seccion->codigo;
			$seccion_salas=Seccion_Sala::all()->where('codigo_seccion','=',$codigo);
			//return $seccion_salas;
			foreach($seccion_salas as $sala) {
				$bloque=$sala->bloque;
				
				if ($bloque[0]=='L') {
					$x=0;
				}
				else if ($bloque[0]=='M') {
					$x=1;
				}
				else if ($bloque[0]=='W') {
					$x=2;
				}
				else if ($bloque[0]=='J') {
					$x=3;
				}
				else if ($bloque[0]=='V') {
					$x=4;
				}
				else if ($bloque[0]=='S') {
					$x=5;
				}
				$y=((int)$bloque[1])-1;
				$nombreSala=Sala::where('codigo','=',$sala->codigo_sala)->first();
				$numeroSala=$nombreSala->nombre;
				$salida[$x][$y]=collect(['color','sala'])->combine([$colors[$colorpos],$numeroSala]);
			}
			$colorpos=$colorpos+1;
		}
        return $salida;
    }
    #para ver el horario de un alumno -> retorno contiene Bloques, Sala, Ubicacion y color 
    public function obtenerHorario($id){
		
		$alumno=Alumno::find($id);
		$rut=$alumno->rut;
        $secciones_alumnos=collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursando', '=', 's'));
        $secciones= new Collection;
        foreach ($secciones_alumnos as $seccion_alumno){
            $seccion= Seccion::find($seccion_alumno->codigo_seccion)->first();
            $secciones->push($seccion);
        }
        $secciones->all();
        $horario = array();
        $secciones_Salas=new Collection;
        $rand = 0;
        foreach ($secciones as $seccion) {
            if($rand == 0){
                $color = "teal accent-3";
            }
            elseif($rand == 1){
                $color = "purple darken-1";
            }
            elseif($rand == 2){
                $color = "red darken-4";
            }
            elseif($rand == 3){
                $color = "lime darken-1";
            }
            elseif($rand == 4){
                $color = "blue-grey darken-1";
            }
            else{
                $color = "brown lighten-1";
            }
            $secciones_Salas=collect(Seccion_Sala::all()->where('codigo_seccion','=',$seccion->codigo));
            foreach ($secciones_Salas as $seccion_Sala){
                $aux = new Collection;
                $sala=Sala::find($seccion_Sala->codigo_sala)->first();
                $aux = collect(['sala' => $sala->nombre, 'bloque' => $seccion_Sala->bloque, 'ubicacion' => $sala->ubicacion, 'color' => $color]);
                $horario = push($horario, $aux);
             }

             $rand = $rand + 1;
        }
        
        return $horario;

    }

    public function getHorario($id){

        $alumno=Alumno::find($id);
		$rut=$alumno->rut;
        $secciones_alumnos=collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut)->where('estado_cursado','=','s'));
		$codigo_secciones=$secciones_alumnos->pluck('codigo_seccion');
		$secciones_cursando=collect(Seccion::find($codigo_secciones));
        $codigo_asignaaturas = $secciones_cursando->pluck('codigo_asignatura');
        $asignatura_cursando = collect(Asignatura::find($codigo_asignaaturas));
        return $asignatura_cursando;
        $retorno = new Collection;
        foreach ($secciones_alumnos as $se) {
            $seccion = $se->codigo_seccion;
            $secciones = collect(Seccion_Alumno::all()->where('rut_alumno','=',$rut));
            $retorno->push($se);
        }

		return $retorno;
        
    }

	public function obtenerDatosCurriculares($id) {
		$alumno=Alumno::find($id);
		$rut=$alumno->rut;
		$salida = new Collection;
		$salida = push(['nivel' => $alumno 
		]);
	}
	
    public function obtenerSemestre(){
        $hoy = Carbon::today();
        if ($hoy->month <=7){
            $semestre = 1;
        }
        else{
            $semestre = 2;
        }
        $anio = $hoy->year;
        #*************************Hay que devolver tanto semestre como anio*************************
        return collect(['semestre','year'])->combine([$semestre,$anio]);
    }

    public function obtenerDataSeccion($id){
        $alumno = Alumno::where('rut_alumno' == $id)->first();
    }
	
	public function getAlumnoName($id) {
		$alumno=Alumno::find($id);
		return $alumno->nombre;
	}
}
