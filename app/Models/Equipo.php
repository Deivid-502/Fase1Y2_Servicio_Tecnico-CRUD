<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = 'equipos';
    protected $fillable = ['marca_id','serial','modelo','tipo','observacion'];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'equipo_id');
    }
}
