<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'users',
            'comunidads',
            'disciplinas',
            'precios',
            'sexos',
            'capas',
            'razas',
            'caballos'
        ]);



        $this->call(UsersTableSeeder::class);
        $this->call(ComunidadesTableSeeder::class);
        $this->call(DisciplinasTableSeeder::class);
        $this->call(PreciosTableSeeder::class);
        $this->call(SexosTableSeeder::class);
        $this->call(CapasTableSeeder::class);
        $this->call(CaractersTableSeeder::class);
        $this->call(RazasTableSeeder::class);
        $this->call(CaballosTableSeeder::class);
    }

    protected function truncateTables(array $tables) {
        
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach($tables as $table) {
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }



}
