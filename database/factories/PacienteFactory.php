<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {

    return [
        'run' => rand(4444444,9999999),
        'dv_run' => rand(1,10),
        'apellido_paterno' => $faker->lastName,
        'apellido_materno' => $faker->lastName,
        'primer_nombre' => $faker->firstName,
        'segundo_nombre' => $faker->firstName,
        'fecha_nac' => $faker->date(),
        'sexo' => $faker->randomElement(['M','F']),
        'sigla_grado' => null,
        'unid_rep_dot' => null,
        'cond_alta_dot' => null,
        'direccion' => $faker->address,
        'familiar_responsable' => $faker->name,
        'telefono' => $faker->phoneNumber,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
