<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Medicamento;
use Faker\Generator as Faker;

$factory->define(Medicamento::class, function (Faker $faker) {

    return [
        'nombre' => $this->faker->word,
        'indicaciones' => $this->faker->word,
        'contraindicaciones' => $this->faker->word,
        'advertencias' => $this->faker->word,
        'dosis' => $this->faker->word,
        'via_admin' => $this->faker->word,
        'laboratorio_id' => $this->faker->word,
        'forma_id' => $this->faker->word,
        'receta' => $this->faker->word,
        'cantidad_total' => $this->faker->word,
        'cantidad_formula' => $this->faker->word,
        'generico' => $this->faker->word,
        'created_at' => $this->faker->word,
        'updated_at' => $this->faker->word,
        'deleted_at' => $this->faker->word
    ];
});
