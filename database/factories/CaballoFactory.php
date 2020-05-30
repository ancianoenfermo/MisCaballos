<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Caballo;
use App\Capa;
use App\Comunidad;
use App\Precio;
use App\Sexo;
use App\User;
use Faker\Generator as Faker;

$factory->define(Caballo::class, function (Faker $faker) {
   
    $totalUsers = User::count();
    $totalComunidades = Comunidad::count();
    $totalSexos = Sexo::count();
    $totalCapas = Capa::count();
    $totalPrecios = Precio::count();
    
    
    return [
        'name' => $faker->name,
        'fechaNacimiento' => now(),
        'alzada' => $faker->numberBetween(140,200),
        'textoDestacado' => $faker->text($maxNbCahrs = 120),
        'body' => $faker->text($maxNbCahrs = 300), 
       
        'user_id' => $faker->numberBetween(1,$totalUsers),
        'comunidad_id' => $faker->numberBetween(1,$totalComunidades),
        'sexo_id' => $faker->numberBetween(1,$totalSexos),
        'capa_id' => $faker->numberBetween(1,$totalCapas),
        'precio_id' => $faker->numberBetween(1,$totalPrecios),
    ];
});
