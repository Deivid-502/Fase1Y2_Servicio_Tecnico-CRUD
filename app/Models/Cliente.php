<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nombre','telefono','email','direccion','documento'];

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'cliente_id');
    }
}
