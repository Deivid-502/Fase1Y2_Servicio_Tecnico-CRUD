<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnicosTable extends Migration
{
    public function up()
    {
        Schema::create('tecnicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',150);
            $table->string('email',150)->nullable();
            $table->string('telefono',50)->nullable();
            $table->boolean('activo')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tecnicos');
    }
}
