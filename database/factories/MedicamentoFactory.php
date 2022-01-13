<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Medicamento;
use Faker\Generator as Faker;

$autoIncrement = autoIncrement2();

$factory->define(Medicamento::class, function (Faker $faker) use ($autoIncrement) {

    $autoIncrement->next();

    return [
        'nombre' => $faker->word,
        'codigo' => $autoIncrement->current(),
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

function autoIncrement2()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}
