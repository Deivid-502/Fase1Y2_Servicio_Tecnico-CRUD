<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstadoServicio extends Model
{
    protected $table = 'servicio_estados';
    protected $fillable = ['clave','nombre','orden'];

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'estado_actual_id');
    }

    public function historial()
    {
        return $this->hasMany(HistEstado::class, 'estado_id');
    }
}
