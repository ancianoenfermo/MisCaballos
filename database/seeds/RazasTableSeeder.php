<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RazasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table ( 'razas' ) -> delete ();

        DB :: table ( 'razas' ) -> insert ([
            [ 'id' => '1' ,  'name' => "Raza 1" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '2' ,  'name' => "Raza 2" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '3' ,  'name' => "Raza 3" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '4' ,  'name' => "Raza 4" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '5' ,  'name' => "Raza 5" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '6' ,  'name' => "Raza 6" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
        ]);
    }
}
