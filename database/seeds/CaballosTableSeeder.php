<?php

use App\Caballo;
use Illuminate\Database\Seeder;

class CaballosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Caballo::class)->times(100)->create();
    }
}
