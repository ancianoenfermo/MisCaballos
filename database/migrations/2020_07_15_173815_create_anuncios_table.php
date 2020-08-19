<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnunciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo',['Venta','Cesion'])->default('Venta');
            $table->enum('estado',['PUBLICO','PRIVADO'])->default('PRIVADO');
            $table->string('textoDestacado')->nullable();
            $table->timestamp('fechaPublicacion')->nullable();
            $table->timestamp('fechaActualizacion')->nullable();
           /*  Venta */
            $table->boolean('transporte')->nullable();
            $table->bigInteger('precio_id')->unsigned()->nullable();
            $table->foreign('precio_id')->references('id')->on('precios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            /* Cesion */
            

            

           
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->bigInteger('caballo_id')->unsigned();
            $table->foreign('caballo_id')->references('id')->on('caballos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
           
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anuncios');
    }
}


