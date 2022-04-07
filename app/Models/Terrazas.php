<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terrazas extends Model
{
    protected $fillable = ['descripcion'];

    public static function crear($id_terraza){
        Terrazas::create(['descripcion' => 'Terraza ' . $id_terraza ]);
        return true;
    }
}
