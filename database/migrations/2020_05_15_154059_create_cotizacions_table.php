<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            $table->string('articulo');
            $table->longText('descripcion')->nullable();
            $table->string('marca')->nullable();
            $table->string('modelo')->nullable();
            $table->string('codigo')->nullable();
            $table->string('numero_serie')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('cantidad')->nullable();
            $table->string('year')->nullable();
            $table->string('usado')->nullable();
            $table->string('probabilidad')->nullable();
            $table->string('imagen')->nullable();
            $table->string('estado')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categoria_id');
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
        Schema::dropIfExists('cotizacions');
    }
}
