<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlquilersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquilers', function (Blueprint $table) {
      $table->string('cod_alquiler')->primary();
      $table->string('cod_pelicula_fk');
      $table->unsignedbigInteger('cod_users_fk');
      $table->string('precio_alquiler');
      $table->string('estado');
      $table->date('fecha_entrega');


      $table->foreign('cod_pelicula_fk')
           ->references('cod_pelicula')
           ->on('peliculas')
           ->onDelete('cascade');

           $table->foreign('cod_users_fk')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('alquilers');
    }
}
