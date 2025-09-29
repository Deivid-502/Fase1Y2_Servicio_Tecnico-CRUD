<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioEstadoHistTable extends Migration
{
    public function up()
    {
        Schema::create('servicio_estado_hist', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servicio_id')->constrained('servicios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('estado_id')->constrained('servicio_estados')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('cambiado_por_tecnico_id')->nullable()->constrained('tecnicos')->onUpdate('cascade')->onDelete('set null');
            $table->dateTime('fecha_cambio')->useCurrent();
            $table->text('nota')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicio_estado_hist');
    }
}
