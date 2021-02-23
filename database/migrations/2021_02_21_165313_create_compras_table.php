<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
          $table->string('cod_compra')->primary();
            $table->string('cod_pelicula_fk');
            $table->unsignedbigInteger('cod_users_fk');
            $table->string('precio_compra');

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
        Schema::dropIfExists('compras');
    }
}
