<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Capa;
use App\Raza;
use App\Sexo;
use App\User;
use App\Caballo;
use App\Caracter;
use App\Concurso;
use App\Comunidad;
use Carbon\Carbon;
use App\Disciplina;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Caballo::class, function (Faker $faker) {
   
    $totalUsers = User::count();
    $totalComunidades = Comunidad::count();
    $totalSexos = Sexo::count();
    $totalCapas = Capa::count();
    $totalRazas = Raza::count();
    $totalConcursos = Concurso::count();
    $portadas = array('portada1.jpg','portada2.jpg','portada3.jpg','portada4.jpg','portada5.jpg','portada6.jpg','portada7.jpg','portada8.jpg','portada9.jpg');
    $totalPortadas = count($portadas);

    $nombreCaballo = $faker->name;


    return [
        'name' => $nombreCaballo,
        'urlClean' => Str::of($nombreCaballo)->slug(),
        'fechaNacimiento' => now(),
        'alzada' => $faker->numberBetween(140,200),
        'alzadaEstimada' => $faker->numberBetween(140,200),
        'body' => $faker->text($maxNbCahrs = 300), 
        'user_id' => $faker->numberBetween(1,$totalUsers),
        'raza_id' => $faker->numberBetween(1,$totalRazas),
        'comunidad_id' => $faker->numberBetween(1,$totalComunidades),
        'sexo_id' => $faker->numberBetween(1,$totalSexos),
        'capa_id' => $faker->numberBetween(1,$totalCapas),
        'concurso_id' => $faker->numberBetween(1,$totalConcursos),
        'fotoPortada' => $portadas[$faker->numberBetween(0,$totalPortadas-1)],
        'fechaPublicacion' => Carbon::now()
    ];
});
