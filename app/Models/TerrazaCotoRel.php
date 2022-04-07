<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerrazaCotoRel extends Model
{
   protected $fillable = ['id_terraza', 'id_coto', 'distancia'];

   public static function crear($id_terraza,$id_coto,$distancia){
        TerrazaCotoRel::create([
            'id_terraza' => $id_terraza,
            'id_coto' => $id_coto,
            'distancia' => $distancia,
        ]);
   }

   public static function traerTerrazaCercana($id_casa){
        return TerrazaCotoRel::leftjoin('cotos as ct',function($ct){
            $ct->on('ct.id_cotos','=','terraza_coto_rels.id_coto');
        })->leftjoin('casas as cs',function($cs){
            $cs->on('cs.id_cotos','=','ct.id_cotos');
        })->leftjoin('terrazas as t',function($t){
            $t->on('t.id_terraza','=','terraza_coto_rels.id_terraza');
        })->select('t.id_terraza','t.descripcion as terraza','terraza_coto_rels.distancia')
        ->where('cs.id_casas',$id_casa)
        ->orderBy('terraza_coto_rels.distancia','asc')
        ->first();
   }
}
