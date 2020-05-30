<?php

use App\models\Comunidad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComunidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: table ( 'comunidads' ) -> delete ();

        DB :: table ( 'comunidads' ) -> insert ([
            [ 'id' => '1' ,  'name' => "Andalucía" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '2' ,  'name' => "Aragón" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '3' ,  'name' => "Asturias, Principado de" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '4' ,  'name' => "Baleares, Islas" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '5' ,  'name' => "Canarias" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '6' ,  'name' => "Cantabria" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '7' ,  'name' => "Castilla y León" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '8' ,  'name' => "Castilla - La Mancha" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '9' ,  'name' => "Cataluña" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '10' ,  'name' => "Comunidad Valenciana" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '11' ,  'name' => "Extramadura" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '12' ,  'name' => "Galicia" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '13' ,  'name' => "Madrid, Comunidad de" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '14' ,  'name' => "Murcia, Región de" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '15' ,  'name' => "Navarra, Comunidad Foral de" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '16' ,  'name' => "País Vasco" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '17' ,  'name' => "Rioja, La" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '18' ,  'name' => "Ceuta" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '19' ,  'name' => "Melilla" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ]
        ]);
    
    }
}
