<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marca_id')->constrained('marcas')->onUpdate('cascade')->onDelete('restrict');
            $table->string('serial',120)->nullable();
            $table->string('modelo',150)->nullable();
            $table->string('tipo',50)->nullable();
            $table->text('observacion')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
