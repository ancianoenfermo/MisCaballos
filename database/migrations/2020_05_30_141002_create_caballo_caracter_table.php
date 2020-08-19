<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaballoCaracterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caballo_caracter', function (Blueprint $table) {
            $table->id();
           
            $table->bigInteger('caballo_id')->unsigned();
            $table->foreign('caballo_id')->references('id')->on('caballos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        
            $table->bigInteger('caracter_id')->unsigned();
            $table->foreign('caracter_id')->references('id')->on('caracters')
             ->onDelete('cascade')
             ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caballo_caracter');
    }
}
