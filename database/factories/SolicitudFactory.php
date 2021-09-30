<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Solicitud;
use App\Models\SolicitudEstado;
use Carbon\Carbon;
use Faker\Generator as Faker;


$autoIncrement = autoIncrement();

$factory->define(Solicitud::class, function (Faker $faker) use ($autoIncrement) {

    $fechaSolicita = Carbon::now()->subDays(rand(0,4));

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
        'observaciones' => $faker->text,
        'user_crea' => \App\Models\User::all()->random()->id,
        'user_actualiza' => \App\Models\User::all()->random()->id,
        'fecha_solicita' => $fechaSolicita,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}
