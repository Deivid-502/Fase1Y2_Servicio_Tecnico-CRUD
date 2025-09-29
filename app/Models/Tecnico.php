<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    protected $table = 'tecnicos';
    protected $fillable = ['nombre','email','telefono','activo'];

    protected $casts = [
        'activo' => 'boolean'
    ];

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'tecnico_id');
    }

    public function cambiosEstado()
    {
        return $this->hasMany(HistEstado::class, 'cambiado_por_tecnico_id');
    }
}
