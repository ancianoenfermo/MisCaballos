<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB :: table ( 'capas' ) -> delete ();

        DB :: table ( 'capas' ) -> insert ([
            [ 'id' => '1' ,  'name' => "Alazán" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '2' ,  'name' => "Alazán rojizo" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
              [ 'id' => '3' ,  'name' => "Alazán tostado, Principado de" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '4' ,  'name' => "Atigrado/Moteado" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '5' ,  'name' => "Bayo" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '6' ,  'name' => "Buckskin/Bayo" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '7' ,  'name' => "Castaño" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '8' ,  'name' => "Castaño claro" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '9' ,  'name' => "Castaño oscuro" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '10' ,  'name' => "Castaño rojizo" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '11' ,  'name' => "Castaño-ruano" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '12' ,  'name' => "Champagne/Champán" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '13' ,  'name' => "Cremello" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '14' ,  'name' => "Dunalino (Cervuno x Palomino)" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '15' ,  'name' => "Grullo, Comunidad Foral de" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '16' ,  'name' => "Molde de Falb marrón" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '17' ,  'name' => "Morcillo" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '18' ,  'name' => "Negro" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '19' ,  'name' => " Overo-todas las-capas" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '20' ,  'name' => "Palomino" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '21' ,  'name' => "Perla" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '22' ,  'name' => "Perlino" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '23' ,  'name' => "Pío" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '24' ,  'name' => "Porcelana" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '25' ,  'name' => "Puede ser de molde" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '26' ,  'name' => "Rabicano" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '27' ,  'name' => "Red Dun/Cervuno" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '28' ,  'name' => "Ruano alazán" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '29' ,  'name' => "Ruano azulado" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '30' ,  'name' => "Sabino" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '31' ,  'name' => "Tobiano-todas las-capas" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '32' ,  'name' => "Tordillo negro" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '33' ,  'name' => "Tordo, Región de" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '34' ,  'name' => "Navarra, Comunidad Foral de" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '35' ,  'name' => "Tordo picazo" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '36' ,  'name' => "Tordo rodado" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '37' ,  'name' => "Tordo ruano" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '38' ,  'name' => "Tovero-todas las-capas" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
            [ 'id' => '39' ,  'name' => " White/Blanco" , 'created_at' => new  DateTime , 'updated_at' => new  DateTime ],
        ]);
    }
}
