<?php

use App\Models\Device;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Device::class, function (Faker $faker) {
    return [
        'serial_number' => substr(str_shuffle(str_repeat("0123456789", 12)), 0, 12)
    ];
});
