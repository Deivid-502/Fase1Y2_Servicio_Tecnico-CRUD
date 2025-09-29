<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioEstadosTable extends Migration
{
    public function up()
    {
        Schema::create('servicio_estados', function (Blueprint $table) {
            $table->id();
            $table->string('clave',50);
            $table->string('nombre',100);
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicio_estados');
    }
}
