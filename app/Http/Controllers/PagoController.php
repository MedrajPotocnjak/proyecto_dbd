<?php

namespace App\Http\Controllers;
use App\Alumno;
use App\Pago;
use App\Matricula;
use App\Mensualidad;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pagos=Pago::all();

        return response()->json($pagos);
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
        $pago= new Pago();
        $pago->rut_alumno= $request->rut_alumno;
        $pago->tipo_pago= $request->tipo_pago;
        $pago->forma_pago= $request->forma_pago;
        $pago->save();
        return response()->json($pago);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $pago= Pago::find($id);
        if($request->rut_alumno != NULL){
            $pago->rut_alumno= $request->rut_alumno;
        }    
        if ($request->tipo_pago != NULL){
            $pago->tipo_pago= $request->tipo_pago;
        }
        if ($request->forma_pago != NULL){
            $pago->forma_pago= $request->forma_pago;
        }
        $pago->save();
        return response()->json($pago);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pago = Pago::find($id);
        $pago->delete();
        return "Borrado";
    }
}
