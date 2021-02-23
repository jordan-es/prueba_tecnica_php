<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peliculas', function (Blueprint $table) {
          $table->string('cod_pelicula')->primary();
            $table->string('cod_categoria_fk', 100);
            $table->string('nombre_pelicula', 100);
            $table->string('precio_alquiler');
            $table->string('precio_venta');
            $table->string('año');
            $table->string('descripcion',200);
            $table->string('disponilble');

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
        Schema::dropIfExists('peliculas');
    }
}
