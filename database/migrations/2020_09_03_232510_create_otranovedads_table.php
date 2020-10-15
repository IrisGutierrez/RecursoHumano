<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtranovedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('otranovedads', function (Blueprint $table) {
            $table->id();
            
            $table->BigInteger('colegio_id')->unsigned()->nullable();
            $table->integer('dni')->nullable();
            $table->string('ApellidoNommbre')->nullable();
            $table->string('Cargo')->nullable();
            $table->string('Caracter')->nullable();
            $table->string('GradoSeccion')->nullable();
            $table->date('desdeN')->nullable();
            $table->date('hastaN')->nullable();
            $table->integer('totalN')->nullable();
            $table->text('articulo')->nullable();
            $table->text('observacionesN')->nullable();
            $table->timestamps(); 

            $table->foreign('colegio_id')->references('id')->on('institucions')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('otranovedads');
    }
}
