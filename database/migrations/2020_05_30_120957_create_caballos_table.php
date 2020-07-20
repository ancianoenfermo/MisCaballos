<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaballosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caballos', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->date('fechaNacimiento')->nullable();
            $table->decimal('alzada',3,0)->nullable();
            $table->decimal('alzadaEstimada',3,0)->nullable();
            $table->text('body')->nullable();
            $table->string('fotoPortada')->nullable();
            
            $table->enum('estado',['PUBLICO','PRIVADO'])->default('PRIVADO');
            $table->timestamp('fechaPublicacion')->nullable();
            $table->timestamp('fechaActualizacion')->nullable(); //solo para publicado
            
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->bigInteger('raza_id')->unsigned()->nullable();
            $table->foreign('raza_id')->references('id')->on('razas')
                ->onDelete('cascade')
                ->onUpdate('cascade'); 
            
            
            $table->bigInteger('comunidad_id')->unsigned()->nullable();
            $table->foreign('comunidad_id')->references('id')->on('comunidads')
                ->onDelete('cascade')
                ->onUpdate('cascade');
    
            $table->bigInteger('sexo_id')->unsigned()->nullable();
            $table->foreign('sexo_id')->references('id')->on('sexos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
    
            $table->bigInteger('capa_id')->unsigned()->nullable();
            $table->foreign('capa_id')->references('id')->on('capas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->bigInteger('concurso_id')->unsigned()->nullable();
            $table->foreign('concurso_id')->references('id')->on('concursos')
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
        Schema::dropIfExists('caballos');
    }
}
