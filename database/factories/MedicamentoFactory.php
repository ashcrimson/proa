<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Medicamento;
use Faker\Generator as Faker;

$factory->define(Medicamento::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'indicaciones' => $faker->text,
        'contraindicaciones' => $faker->text,
        'advertencias' => $faker->text,
        'dosis' => $faker->text,
        'via_admin' => null,
        'laboratorio_id' => null,
        'forma_id' => null,
        'receta' => null,
        'cantidad_total' => null,
        'cantidad_formula' => null,
        'generico' => null,
    ];
});
