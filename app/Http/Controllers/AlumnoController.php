<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Matricula;
use App\Mensualidad;
use App\Pago;
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


    public function getPagos($id) {
        $alumno=Alumno::find($id);
        $rut=$alumno->rut;
		return Pago::all()->where('rut_alumno','=',$rut);
	}

    public function addPago($id,Request $request){
        $pago = new Pago();
        $alumno=Alumno::find($id);
        $rut=$alumno->rut;
        $pago->rut_alumno = $rut;
        $pago->tipo_pago= $request->tipo_pago;
        $pago->forma_pago= $request->forma_pago;
        $pago->save();
        if($request->tipo_pago == 'm'){
            $matricula = new Matricula();
            $matricula->codigo_pago = $pago->codigo;
            $matricula->estado_matricula = 'pagado';
            $matricula->costo = $request->costo;
            $matricula->save();
            
        }
        if($request->tipo_pago == 'a'){
           $mensualidad = new Mensualidad();
           $mensualidad->codigo_pago = $pago->codigo;
           $mensualidad->numero_mensualidad = $request->numero_mensualidad;
           $mensualidad->costo = $request->costo;
           $mensualidad->save();
        }
        return response()->json($pago);
    }

    public function statusMatricula($id){

        $collection= new Collection;
        $alumno=Alumno::find($id);
        $rut=$alumno->rut;
        $pagos=Pago::all()->where('rut_alumno','=',$rut);
        $encontrado = 0;
		foreach ($pagos as $pago) {
            if($pago->tipo_pago == 'm'){
                $matriculas = Matricula::all()->where('codigo_pago','=',$pago->codigo);
                $encontrado =1;
            }
        }
        if ($encontrado != 0 ){
            $matricula =$matriculas->last(); 
            if($matricula->estado_matricula = "pagado"){
                return 'Matricula activa';
            }
            
        }
        return 'Matricula no activa';
        //$matricula = Matricula::find($pago->codigo);

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
