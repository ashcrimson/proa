<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Solicitud;
use Faker\Generator as Faker;

$factory->define(Solicitud::class, function (Faker $faker) {

    return [
        'codigo' => $this->faker->word,
        'correlativo' => $this->faker->randomDigitNotNull,
        'paciente_id' => $this->faker->word,
        'estado_id' => $this->faker->word,
        'inicio' => $this->faker->word,
        'continuacion' => $this->faker->word,
        'terapia_empirica' => $this->faker->text,
        'terapia_especifica' => $this->faker->text,
        'fuente_infeccion_extrahospitalaria' => $this->faker->word,
        'fuente_infeccion_intrahospitalaria' => $this->faker->word,
        'disfuncion_renal' => $this->faker->word,
        'disfuncion_hepatica' => $this->faker->word,
        'creatinina' => $this->faker->word,
        'peso' => $this->faker->word,
        'observaciones' => $this->faker->text,
        'user_crea' => $this->faker->word,
        'user_actualiza' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
    ];
});
