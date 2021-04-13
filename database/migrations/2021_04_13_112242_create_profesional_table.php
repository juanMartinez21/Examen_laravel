<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfesionalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional', function (Blueprint $table) {
            $table->id();
            $table->integer('nroDocumento');
            $table->string('nombre',30);
            $table->string('apellido',30);
            $table->string('habilidades',255);
            $table->double('salario');
            $table->boolean('disponible')->default(1);
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
        Schema::dropIfExists('profesional');
    }
}
