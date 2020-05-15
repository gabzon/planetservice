<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cotizacion;
use Faker\Generator as Faker;

$factory->define(Cotizacion::class, function (Faker $faker) {
    return [
        'articulo' => $faker->word,
        'descripcion' => $faker->text,
        'marca' => $faker->word,
        'modelo' => $faker->word,
        'codigo' => $faker->word,
        'numero_serie' => $faker->word,
        'color' => $faker->word,
        'size' => $faker->word,
        'cantidad' => $faker->word,
        'year' => $faker->word,
        'usado' => $faker->word,
        'probabilidad' => $faker->word,
        'imagen' => $faker->word,
        'estado' => $faker->word,
        'user_id' => factory(\App\User::class),
        'categoria_id' => factory(\App\Categoria::class),
    ];
});
