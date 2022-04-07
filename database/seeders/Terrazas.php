<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Terrazas as Terr;

class Terrazas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($c=1; $c <= 10 ; $c++) { 
                Terr::crear($c);
            }
    }
}
