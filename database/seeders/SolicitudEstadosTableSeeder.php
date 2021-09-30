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

        factory(SolicitudEstado::class,1)->create(['nombre' => 'Temporal']);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Ingresada']);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Solicitada']);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Aprobada']);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Despachada']);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Rechazada']);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Anulada']);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'Vencida']);
        factory(SolicitudEstado::class,1)->create(['nombre' => 'PARA REGRESAR']);



    }
}
