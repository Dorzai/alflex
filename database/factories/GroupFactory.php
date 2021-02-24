<?php

use App\Models\Group;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Group::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});
