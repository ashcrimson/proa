<?php

namespace Database\Seeders;

use App\Imports\ImportMicroorganismos;
use App\Models\Microorganismo;
use Illuminate\Database\Seeder;

class MicroorganismosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('microorganismos')->delete();

        $import = new ImportMicroorganismos();

        $import->import(public_path('imports/Listado_Microorganismos_Micro.xls'));




    }
}
