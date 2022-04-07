<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TerrazaCotoRel;

class RelTerrazaCoto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($c=1; $c <= 70 ; $c++) { 
            for ($t=1; $t <= 10 ; $t++) {
                $distancia =  rand(1, 100);
                TerrazaCotoRel::crear($t,$c,$distancia);
            }
        }
    }
}
