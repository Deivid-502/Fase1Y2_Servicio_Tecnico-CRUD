<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EstadoSeeder extends Seeder
{
    public function run()
    {
        $hoy = Carbon::now()->toDateTimeString();

        $items = [
            ['clave'=>'recibido','nombre'=>'Recibido','orden'=>1],
            ['clave'=>'reparando','nombre'=>'En reparación','orden'=>2],
            ['clave'=>'pendiente_repuestos','nombre'=>'Pendiente repuestos','orden'=>3],
            ['clave'=>'finalizado','nombre'=>'Finalizado','orden'=>4],
            ['clave'=>'entregado','nombre'=>'Entregado','orden'=>5],
        ];

        foreach ($items as $it) {
            $exists = DB::table('servicio_estados')->where('clave', $it['clave'])->first();
            if (!$exists) {
                DB::table('servicio_estados')->insert([
                    'clave' => $it['clave'],
                    'nombre' => $it['nombre'],
                    'orden' => $it['orden'],
                    'created_at' => $hoy,
                    'updated_at' => $hoy
                ]);
            }
        }
    }
}
