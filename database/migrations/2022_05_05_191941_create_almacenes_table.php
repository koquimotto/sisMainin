<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlmacenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('almacenes', function (Blueprint $table) {
            $table->id();
            $table->string('almacen')->nullable();
            // $table->enum('tipo',['principal',''])->default('');
            $table->unsignedBigInteger('pais_id')->index()->nullable();
            $table->foreign('pais_id')
                ->references('id')
                ->on('paises')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('ciudad_id')->index()->nullable();
            $table->foreign('ciudad_id')
                ->references('id')
                ->on('ciudades')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('estado')->default(1);
            $table->string('photo')->nullable();

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
        Schema::dropIfExists('almacenes');
    }
}
