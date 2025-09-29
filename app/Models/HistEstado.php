<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistEstado extends Model
{
    protected $table = 'servicio_estado_hist';
    protected $fillable = ['servicio_id','estado_id','cambiado_por_tecnico_id','fecha_cambio','nota'];

    public $timestamps = false;

    protected $casts = [
        'fecha_cambio' => 'datetime',
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'servicio_id');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoServicio::class, 'estado_id');
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'cambiado_por_tecnico_id');
    }
}
