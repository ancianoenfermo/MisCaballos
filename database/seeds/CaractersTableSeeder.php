<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaractersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: table ( 'caracters' ) -> delete ();

        DB :: table ( 'caracters' ) -> insert ([
            [ 'id' => '1' ,  'name' => "Ideal para niños" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '2' ,  'name' => "Caballo de escuela" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '3' ,  'name' => "Apto para equinoterapia" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
        ]);
    
    }
}
