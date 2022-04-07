<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casas extends Model
{
     protected $fillable = ['descripcion', 'id_cotos'];

     public static function crear($id_casas,$id_cotos){
        Casas::create([
            'descripcion' => 'Casa ' . $id_casas . ' - ' . $id_cotos,
            'id_cotos' => $id_cotos
        ]);

        return true;
     }
}
