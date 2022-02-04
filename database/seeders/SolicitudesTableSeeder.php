<?php

namespace Database\Seeders;

use App\Models\Medicamento;
use App\Models\Solicitud;
use App\Models\SolicitudEstado;
use App\Models\SolicitudMedicamento;
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

        $medicamentos = Medicamento::all();

        factory(Solicitud::class,20)->create()->each(function (Solicitud $solicitud) use ($medicamentos){

            $frecuencia1 = array_random([4,6,8,12,24]);
            $frecuencia2 = array_random([4,6,8,12,24]);

            $solicitud->medicamentos()->saveMany([
                new SolicitudMedicamento([
                    'medicamento_id' => $medicamentos->random()->id,
                    'dosis_valor' => rand(1,5),
                    'dosis_unidad' => array_random(['ug','mg','g','ml']),
                    'frecuencia_valor' => $frecuencia1,
                    'frecuencia_unidad' => $frecuencia1 != 24 ? 'horas' : 'dias',
                    'periodo' => rand(2,7),
                    'despachos' => 0
                ]),
                new SolicitudMedicamento([
                    'medicamento_id' => $medicamentos->random()->id,
                    'dosis_valor' => rand(1,5),
                    'dosis_unidad' => array_random(['ug','mg','g','ml']),
                    'frecuencia_valor' => $frecuencia2,
                    'frecuencia_unidad' => $frecuencia2 != 24 ? 'horas' : 'dias',
                    'periodo' => rand(2,7),
                    'despachos' => 0
                ])

            ]);
        });
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
