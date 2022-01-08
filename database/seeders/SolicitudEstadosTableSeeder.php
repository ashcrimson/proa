<?php

namespace Database\Seeders;

use App\Models\SolicitudEstado;
use Illuminate\Database\Seeder;

class SolicitudEstadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('solicitud_estados')->delete();

        factory(SolicitudEstado::class,1)->create(['nombre' => 'Temporal' , 'orden' => 9]);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Ingresada' , 'orden' => 8]);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Solicitada' , 'orden' => 2]);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Aprobada' , 'orden' => 3]);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Despachada' , 'orden' => 7]);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Rechazada' , 'orden' => 4]);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Anulada' , 'orden' => 6]);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Vencida' , 'orden' => 0]);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'EN CORRECCIÓN' , 'orden' => 5]);



    }
}
