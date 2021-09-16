<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Paciente;
use Faker\Generator as Faker;

$factory->define(Paciente::class, function (Faker $faker) {

    return [
        'run' => $this->faker->word,
        'dv_run' => $this->faker->word,
        'apellido_paterno' => $this->faker->word,
        'apellido_materno' => $this->faker->word,
        'primer_nombre' => $this->faker->word,
        'segundo_nombre' => $this->faker->word,
        'fecha_nac' => $this->faker->word,
        'sexo' => $this->faker->word,
        'sigla_grado' => $this->faker->word,
        'unid_rep_dot' => $this->faker->word,
        'cond_alta_dot' => $this->faker->randomDigitNotNull,
        'direccion' => $this->faker->word,
        'familiar_responsable' => $this->faker->word,
        'telefono' => $this->faker->word,
        'telefono2' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
