<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cultivo;
use Faker\Generator as Faker;

$factory->define(Cultivo::class, function (Faker $faker) {

    return [
        'nombre' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),

    ];
});
