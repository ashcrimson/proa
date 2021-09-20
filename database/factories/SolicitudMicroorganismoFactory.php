<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SolicitudMicroorganismo;
use Faker\Generator as Faker;

$factory->define(SolicitudMicroorganismo::class, function (Faker $faker) {

    return [
        'solicitud_id' => $this->faker->word,
        'microorganismo_id' => $this->faker->word,
        'susceptibilidad' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
    ];
});
