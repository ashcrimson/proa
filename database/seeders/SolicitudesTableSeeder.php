<?php

namespace Database\Seeders;

use App\Models\Solicitud;
use App\Models\SolicitudEstado;
use Carbon\Carbon;
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
//        factory(Solicitud::class,1)->create([
//            'estado_id' => SolicitudEstado::SOLICITADA,
//            'fecha_solicita' => Carbon::now()->subDays(1),
//        ]);
//        factory(Solicitud::class,1)->create([
//            'estado_id' => SolicitudEstado::SOLICITADA,
//            'fecha_solicita' => Carbon::now()->subDays(2),
//        ]);
//        factory(Solicitud::class,1)->create([
//            'estado_id' => SolicitudEstado::SOLICITADA,
//            'fecha_solicita' => Carbon::now()->subDays(3),
//        ]);
//        factory(Solicitud::class,1)->create([
//            'estado_id' => SolicitudEstado::SOLICITADA,
//            'fecha_solicita' => Carbon::now()->subDays(4),
//        ]);
//
//        factory(Solicitud::class,1)->create([
//            'estado_id' => SolicitudEstado::RECHAZADA,
//            'fecha_solicita' => Carbon::now()->subDays(5),
//        ]);

    }
}
