<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Detainer;
use App\Wagon;
use App\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Wagon::class, function (Faker $faker) {
    return [
        'inw' => $faker->numerify('########'),
        'arrived_at' => Carbon::parse('-2 hours'),
        'detained_at' => Carbon::parse('-1 hours'),
        'released_at' => null,
        'departed_at' => null,
        'detainer_id' => function () {
            if (Detainer::all()->count()) {
                return Detainer::first()->id;
            }

            return factory(Detainer::class)->create()->id;
        },
        'reason' => $faker->sentence(4),
        'cargo' => $faker->jobTitle,
        'forwarder' => $faker->jobTitle,
        'ownership' => $faker->buildingNumber,
        'departure_station' => $faker->city,
        'destination_station' => $faker->city,
        'taken_measure' => $faker->paragraph(2),
        'creator_id' => function () {
            return factory(User::class)->create()->id;
        }
    ];
});
