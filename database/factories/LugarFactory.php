<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Lugar;
use Faker\Generator as Faker;

$factory->define(Lugar::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
    ];
});
