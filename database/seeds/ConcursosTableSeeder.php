<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB :: table ( 'concursos' ) -> delete ();

        DB :: table ( 'concursos' ) -> insert ([
            [ 'id' => '1' ,  'name' => "Nunca" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '2' ,  'name' => "Ocasionalmente" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '3' ,  'name' => "Habitualmente" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
        ]);
    }
}
