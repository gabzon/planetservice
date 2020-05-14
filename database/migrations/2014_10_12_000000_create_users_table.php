<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->date('birthday')->nullable();
            $table->longText('biografia')->nullable();
            $table->string('sexo')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('direccion')->nullable();
            $table->string('direccion2')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('lugar')->nullable();
            $table->string('estado')->nullable();
            $table->string('pais')->nullable();
            $table->string('avatar')->nullable();
            $table->string('profession')->nullable();
            $table->boolean('es_empresa')->nullable();
            $table->string('nombre_empresa')->nullable();
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
        Schema::dropIfExists('users');
    }
}
