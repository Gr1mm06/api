<?php

namespace App\Http\Controllers;

use App\Models\TerrazaCotoRel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cotos;
use App\Models\Casas;
use App\Models\Agenda;
use App\Models\Horas;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use DateTime;

class TerrazaCotoRelController extends Controller
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
    public function store(){
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TerrazaCotoRel  $terrazaCotoRel
     * @return \Illuminate\Http\Response
     */
    public function show(){
       // return response()->json(auth()->user());
        
        if(auth()->user()->rol == 1){
           $agenda = Agenda::mostrarAgenda();
           foreach($agenda as $a){
                $lista[] = [
                    'terraza' => $a->terraza,
                    'usuario' => $a->usuario,
                    'fecha' => $a->fecha,
                    'hora' => $a->hora,
                    'comentario' => $a->comentario,
                    'estatus' => $a->estatus
                ];
           }
           return response()->json(['lista' => $lista]);
        }else{
            $id_casa = auth()->user()->id_casa;
                $fechaHoy = date('Y-m-d');
            $espaciosDisponibles = $this->_espaciosDisponibles($id_casa,$fechaHoy);
            
            return response()->json(['espacios' => $espaciosDisponibles]);

        }
        
    }

    private function _espaciosDisponibles($id_casa,$fecha){
            
                $fechasAgendadas = Agenda::fechasAgendadas($fecha);
                $terrazaCercana = TerrazaCotoRel::traerTerrazaCercana($id_casa);
                foreach($fechasAgendadas as $f){
                    $horasAgendadas[] = ($f->id_hora);
                }
                if(!empty($horasAgendadas)){
                    $horasLibres = Horas::horasLibresPorAgenda($horasAgendadas);
                }else{
                $horasLibres = Horas::all();
            }
            foreach($horasLibres as $h){
                $espaciosDisponibles[] = [
                    'terraza' => $terrazaCercana['terraza'],
                    'distancia' => $terrazaCercana['distancia'],
                    'fecha' => $fecha,
                    'hora' => $h->hora,
                    'id_hora' => $h->id_hora
                ];
            }

        return $espaciosDisponibles;
    }

    public function explorarFechas(Request $request){
            $id_casa = auth()->user()->id_casa;
            $fecha = $request->fecha;
            $espaciosDisponibles = $this->_espaciosDisponibles($id_casa,$fecha);
            return response()->json(['espacios' => $espaciosDisponibles]);
    }

    public function apartarFecha(Request $request){
        $id_usuario = auth()->user()->id;
        $fecha = $request->fecha;
        $id_hora = $request->hora;
        $id_terraza = $request->id_terraza;
        try{
                AAgenda::crearApartdo($id_usuario,$id_terraza,$id_hora,$fecha);
                return  response()->json([
                    'status' => 'ok',
                    'data' => 'Registro Guardado'
                ], 200);

            }catch(Exception $e){
                return  response()->json([
                'status' => 'error',
                'data' => 'Ocurrio un error al agendar.'
                ], 500);
            }
        

        
    }

    public function estatusAgenda(Request $request){
        if(auth()->user()->rol == 1){
            $estatus = $request->estatus;
            $comentario = $request->comentario;
            $id_agenda = $request->id_agenda;
            try{
                Agenda::cambiarEstatus($estatus,$comentario,$id_agenda);
                return  response()->json([
                    'status' => 'ok',
                    'data' => 'Cambios realizados'
                ], 200);

            }catch(Exception $e){
                return  response()->json([
                'status' => 'error',
                'data' => 'Ocrrio un error al actualizar.'
                ], 500);
            }

            
        }else{
            return  response()->json([
                'status' => 'error',
                'data' => 'No tiene autorizxacion para esta accion'
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TerrazaCotoRel  $terrazaCotoRel
     * @return \Illuminate\Http\Response
     */
    public function edit(TerrazaCotoRel $terrazaCotoRel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TerrazaCotoRel  $terrazaCotoRel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TerrazaCotoRel $terrazaCotoRel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TerrazaCotoRel  $terrazaCotoRel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TerrazaCotoRel $terrazaCotoRel)
    {
        //
    }
}
