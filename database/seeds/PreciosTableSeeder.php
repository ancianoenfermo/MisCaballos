<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreciosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table ( 'precios' ) -> delete ();

        DB :: table ( 'precios' ) -> insert ([
            [ 'id' => '1' ,  'name' => "menos de 1.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '2' ,  'name' => "de 1.000€ a 2.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '3' ,  'name' => "de 2.000€ a 3.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '4' ,  'name' => "de 3.000€ a 4.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '5' ,  'name' => "de 4.000€ a 6.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '6' ,  'name' => "de 6.000€ a 8.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '7' ,  'name' => "de 8.000€ a 10.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '8' ,  'name' => "de 10.000€ a 15.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '9' ,  'name' => "de 15.000€ a 20.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '10' ,  'name' => "de 20.000€ a 30.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '11' ,  'name' => "de 30.000€ a 40.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '12' ,  'name' => "más de 40.000€" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
        ]);
    }
}
