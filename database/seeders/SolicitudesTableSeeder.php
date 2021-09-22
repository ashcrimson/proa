<?php

namespace Database\Seeders;

use App\Models\Solicitud;
use Illuminate\Database\Seeder;

class SolicitudesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('solicitudes')->delete();

        factory(Solicitud::class,50)->create();


    }
}
