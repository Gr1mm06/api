<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cotos;
use App\Models\Casas;

class CotosCasas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 70 ; $i++) { 
            for ($c=1; $c <= 35 ; $c++) { 
                Casas::crear($c,$i);
            }
            Cotos::crear($i);
        }
    }
}
