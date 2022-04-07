<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horas extends Model
{
    protected $fillable = ['hora'];

    public static  function crear($hora){
        Horas::create(['hora' => $hora]);
    }

    public static function horasLibresPorAgenda($horasAgendadas){
        return Horas::whereNotIn('id_hora',$horasAgendadas)->get();
    }
}
