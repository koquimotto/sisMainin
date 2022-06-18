<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupo_id')->index()->nullable();
            $table->foreign('grupo_id')
                ->references('id')
                ->on('grupos')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('categoria_id')->index()->nullable();
            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('codigo')->nullable();
            $table->string('producto');

            $table->unsignedBigInteger('marca_id')->index()->nullable();
            $table->foreign('marca_id')
                ->references('id')
                ->on('marcas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // $table->unsignedBigInteger('tipo_id')->index()->nullable();
            // $table->foreign('tipo_id')
            //     ->references('id')
            //     ->on('tipos')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
            $table->enum('medida',['unidades','pares','kilogramos','litros','metros'])->default('unidades');
            $table->text('descripcion')->nullable();
            $table->string('photo')->nullable();
            $table->string('cod_barra')->nullable();
            $table->integer('estado')->default(1);

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
        Schema::dropIfExists('productos');
    }
}
