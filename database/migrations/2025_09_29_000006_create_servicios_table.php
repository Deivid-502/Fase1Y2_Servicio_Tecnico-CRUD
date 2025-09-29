<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiciosTable extends Migration
{
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('folio',50)->unique();
            $table->foreignId('cliente_id')->constrained('clientes')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('equipo_id')->constrained('equipos')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('tecnico_id')->nullable()->constrained('tecnicos')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('estado_actual_id')->constrained('servicio_estados')->onUpdate('cascade')->onDelete('restrict');
            $table->dateTime('fecha_recibido');
            $table->dateTime('fecha_entrega')->nullable();
            $table->text('problema_informado');
            $table->text('diagnostico')->nullable();
            $table->text('trabajo_realizado')->nullable();
            $table->decimal('precio_estimado',10,2)->nullable();
            $table->decimal('total',10,2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicios');
    }
}
