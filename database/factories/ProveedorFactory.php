<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Proveedor;
use Faker\Generator as Faker;

$factory->define(Proveedor::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
        'descripcion' => $faker->text,
        'email' => $faker->safeEmail,
        'whatsapp' => $faker->word,
        'viber' => $faker->word,
        'telegram' => $faker->word,
        'wechat' => $faker->word,
        'telefono' => $faker->word,
        'direccion' => $faker->word,
        'codigo_postal' => $faker->word,
        'lugar' => $faker->word,
        'estado' => $faker->word,
        'pais' => $faker->word,
        'facebook' => $faker->word,
        'instagram' => $faker->word,
        'youtube' => $faker->word,
        'tiktok' => $faker->word,
        'snapchat' => $faker->word,
        'twitter' => $faker->word,
        'es_empresa' => $faker->word,
        'cantidad_de_venta' => $faker->word,
        'contacto' => $faker->word,
        'logo' => $faker->word,
        'nif' => $faker->word,
        'user_id' => factory(\App\User::class),
    ];
});
