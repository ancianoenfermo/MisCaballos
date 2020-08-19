<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisciplinasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table ( 'disciplinas' ) -> delete ();

        DB :: table ( 'disciplinas' ) -> insert ([
            [ 'id' => '1' ,  'name' => "Salto" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '2' ,  'name' => "Doma" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '3' ,  'name' => "Completo" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '4' ,  'name' => "Raid" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '5' ,  'name' => "Cross" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
        ]);
    }
}
