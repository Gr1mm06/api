<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agenda';
    protected $fillable = ['id_terraza','id_usuario','comentario','estatus','fecha','hora'];

    public static function mostrarAgenda(){
        return Agenda::leftjoin('terrazas as t',function($t){
            $t->on('t.id_terraza','=','agenda.id_terraza');
        })->leftjoin('usuarios as usr',function($usr){
            $usr->on('usr.id','=','agenda.id_usuario');
        })->leftjoin('horas as h',function($h){
            $h->on('h.id_hora','=','agenda.hora');
        })->select('t.descripcion as terraza','usr.name as usuario','h.hora','agenda.fecha','agenda.comentario','agenda.estatus')
        ->get();
    }

    public static function fechasAgendadas($fecha){
        return Agenda::leftjoin('horas as h',function($h){
            $h->on('h.id_hora','=','agenda.hora');
        })->select('h.id_hora','h.hora','agenda.hora as horaTerraza')
        ->where('agenda.estatus',1)
        ->orWhereNull('agenda.estatus')
        ->get();
    }

    public static function crearApartdo($id_usuario,$id_terraza,$id_hora,$fecha){
        Agenda::create([
            'id_terraza' => $id_terraza,
            'id_usuario' => $id_usuario,
            'hora' => $id_hora,
            'fecha' => $fecha,
        ]);
        return true;
    }

    public static function cambiarEstatus($estatus,$comentario,$id_agenda){
        Agenda::where('id_agenda',$id_agenda)
        ->update([
            'estatus' => $estatus,
            'comentario' => $comentario,
        ]);

        return true;
    }
}
