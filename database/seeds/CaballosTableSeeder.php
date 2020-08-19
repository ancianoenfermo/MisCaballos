<?php

use App\Caballo;
use App\Caballo_disciplinas;
use App\Caracter;
use App\Disciplina;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CaballosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Storage::disk('public')->deleteDirectory('fotos'); */
        factory(Caballo::class)->times(0)->create();
        $disciplinas = Disciplina::all();
        $caracteres = Caracter::all();
        
        Caballo::all()->each(function ($caballo) use ($disciplinas) {
            $caballo->disciplinas()->sync($disciplinas->random(rand(1,3))->pluck('id')->toArray());
        });

        Caballo::all()->each(function ($caballo) use ($caracteres) {
            $caballo->caracters()->sync($caracteres->random(rand(1,3))->pluck('id')->toArray());
        });
    }
}
