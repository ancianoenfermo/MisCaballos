<?php

use App\Caballo;
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
        Storage::disk('public')->deleteDirectory('fotos');
        factory(Caballo::class)->times(100)->create();
    }
}
