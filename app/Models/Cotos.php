<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotos extends Model
{
    protected $fillable = ['descripcion'];

    public static function crear($id_cotos){
        Cotos::create(['descripcion' => 'Coto ' . $id_cotos ]);
        return true;
    }
}
