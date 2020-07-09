<?php

use App\Models\Api\Fortune;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Fortune::class, function (Faker $faker) {
    return [
        'message' => 'This is a test fortune message.'
    ];
});
