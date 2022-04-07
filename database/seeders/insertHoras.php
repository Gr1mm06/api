<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Horas;

class insertHoras extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for ($c=8; $c <= 22 ; $c++) { 
                Horas::crear($c);
        }
    }
}
