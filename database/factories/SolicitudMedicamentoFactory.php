<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SolicitudMedicamento;
use Faker\Generator as Faker;

$factory->define(SolicitudMedicamento::class, function (Faker $faker) {

    return [
        'solicitud_id' => $this->faker->word,
        'medicamento_id' => $this->faker->word,
        'dosis' => $this->faker->word,
        'frecuencia' => $this->faker->word,
        'periodo' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
