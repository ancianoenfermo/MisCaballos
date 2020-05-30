<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaballoDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caballo_disciplina', function (Blueprint $table) {
            $table->id();
          
            $table->bigInteger('caballo_id')->unsigned();
            $table->foreign('caballo_id')->references('id')->on('caballos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        
            $table->bigInteger('disciplina_id')->unsigned();
            $table->foreign('disciplina_id')->references('id')->on('disciplinas')
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
        Schema::dropIfExists('caballo_disciplina');
    }
}
