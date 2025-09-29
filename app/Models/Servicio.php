<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';
    protected $fillable = [
        'folio','cliente_id','equipo_id','tecnico_id','estado_actual_id',
        'fecha_recibido','fecha_entrega','problema_informado','diagnostico',
        'trabajo_realizado','precio_estimado','total'
    ];

    protected $casts = [
        'fecha_recibido' => 'datetime',
        'fecha_entrega' => 'datetime',
        'precio_estimado' => 'decimal:2',
        'total' => 'decimal:2'
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'tecnico_id');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoServicio::class, 'estado_actual_id');
    }

    public function historial()
    {
        return $this->hasMany(HistEstado::class, 'servicio_id');
    }
}
