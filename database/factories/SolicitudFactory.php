<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Solicitud;
use App\Models\SolicitudEstado;
use Carbon\Carbon;
use Faker\Generator as Faker;


$autoIncrement = autoIncrement();

$factory->define(Solicitud::class, function (Faker $faker) use ($autoIncrement) {

    $dias = rand(3,6);
    $fechaSolicita = Carbon::now()->subDays($dias);
    $fechaIni = Carbon::now()->subDays($dias-1);
    $fechaFin = Carbon::parse($fechaIni)->addDays(7);

    $diasRandomCrea = rand(0,5);
    $fechaCrea = Carbon::now()->subDays($diasRandomCrea);
    $fechaActualiza = Carbon::now()->subDays(rand(7,9));

    $estados = [
        SolicitudEstado::INGRESADA,
        SolicitudEstado::SOLICITADA,
        SolicitudEstado::APROBADA,
        SolicitudEstado::DESPACHADA,
        SolicitudEstado::RECHAZADA,
    ];

    return [
        'codigo' => prefijoCeros($autoIncrement->current(),4).Carbon::now()->year,
        'correlativo' => $autoIncrement->current(),
        'paciente_id' => \App\Models\Paciente::all()->random()->id,
        'estado_id' => $faker->randomElement($estados),
        'inicio' => rand(0,1),
        'continuacion' => rand(0,1),
        'terapia_empirica' => rand(0,1),
        'terapia_especifica' => rand(0,1),
        'infeccion_extrahospitalaria' => rand(0,1),
        'infeccion_intrahospitalaria' => rand(0,1),
        'disfuncion_renal' => rand(0,1),
        'disfuncion_hepatica' => rand(0,1),
        'creatinina' => rand(50,100),
        'peso' => rand(50,100),
        'descserv' => $faker->randomElement([
            'NEONATOLOGIA',
            'PEDIATRIA',
            'PENSIONADO GENERAL',
            'POLITRAUMATOLOGIA Y ORTOP',
            'SALA MEDICO-QUIRUR CUARTO NORTE',
            'SALA MEDICO-QUIRUR CUARTO SUR',
            'SALA MEDICO-QUIRUR SEGUNDO NORTE',
            'SALA MEDICO-QUIRUR SEXTO NORTE',
            'SALA MEDICO-QUIRUR SEXTO SUR',
            'SALA MEDICO-QUIRUR QUINTO NORTE',
            'SALAS GINECOLOGIA (NORTE)',
            'SALAS OBSTETRICAS (SUR)',
            'UCI NEONATOLOGIA',
            'UREGENCIA GENERAL',

        ]),
        'observaciones' => $faker->text,
        'user_crea' => \App\Models\User::all()->random()->id,
        'user_actualiza' => \App\Models\User::all()->random()->id,
        'fecha_solicita' => $fechaSolicita,
        'fecha_inicio_tratamiento' => $fechaIni,
        'fecha_fin_tratamiento' => $fechaFin,
        'created_at' => $fechaCrea,
        'updated_at' => $fechaActualiza,
    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}
