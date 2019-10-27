<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lead;
use App\Location;
use App\Status;
use Faker\Generator as Faker;

$factory->define(Lead::class, function (Faker $faker) {
    $location = Location::inRandomOrder()->first();
    $status = Status::inRandomOrder()->first();

    // Create some time in last 4 weeks
    $created_at = $faker->dateTimeBetween('-4 weeks', 'now');


    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' => $faker->address,
        'postcode' => $faker->postcode,
        'city' => $faker->city,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'status_id' => $status->id,
        'location_id' => $location->id,
        'created_at' => $created_at,
    ];
});
