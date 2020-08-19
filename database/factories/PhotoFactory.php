<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Caballo;
use App\Model;
use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
   
   
    $totalCaballos = Caballo::count();
    
    
    return [
        'caballo_id' => $faker->numberBetween(1,$totalCaballos),
        'url' => 'f'.$faker->numberBetween(1,224).'.jpg'
    ];
});
