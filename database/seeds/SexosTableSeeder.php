<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SexosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table ( 'sexos' ) -> delete ();

        DB :: table ( 'sexos' ) -> insert ([
            [ 'id' => '1' ,  'name' => "Caballo castrado" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '2' ,  'name' => "Semental" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '3' ,  'name' => "Yegua" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
        ]);
    }
}
