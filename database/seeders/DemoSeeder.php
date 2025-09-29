<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DemoSeeder extends Seeder
{
    public function run()
    {
        $hoy = Carbon::now()->toDateTimeString();

        $clientes = [
            ['nombre'=>'Juan Perez','telefono'=>'502-555-0101','email'=>'juan@example.com','direccion'=>'Calle 1','documento'=>'1234567'],
            ['nombre'=>'Maria Lopez','telefono'=>'502-555-0102','email'=>'maria@example.com','direccion'=>'Av Central','documento'=>'7654321'],
        ];
        foreach ($clientes as $c) {
            DB::table('clientes')->insert(array_merge($c, [
                'created_at'=>$hoy,
                'updated_at'=>$hoy
            ]));
        }

        $tecnicos = [
            ['nombre'=>'Carlos Ruiz','email'=>'carlos@taller.local','telefono'=>'502-555-0201','activo'=>1],
            ['nombre'=>'Ana Torres','email'=>'ana@taller.local','telefono'=>'502-555-0202','activo'=>1],
        ];
        foreach ($tecnicos as $t) {
            DB::table('tecnicos')->insert(array_merge($t, [
                'created_at'=>$hoy,
                'updated_at'=>$hoy
            ]));
        }

        $marcaDell = DB::table('marcas')->insertGetId([
            'nombre'=>'Dell',
            'created_at'=>$hoy,
            'updated_at'=>$hoy
        ]);
        $marcaHP   = DB::table('marcas')->insertGetId([
            'nombre'=>'HP',
            'created_at'=>$hoy,
            'updated_at'=>$hoy
        ]);

        $eq1 = DB::table('equipos')->insertGetId([
            'marca_id' => $marcaDell,
            'serial' => 'SN-DELL-'.rand(100,999),
            'modelo' => 'Inspiron 15',
            'tipo' => 'laptop',
            'observacion' => 'Sin bateria',
            'created_at'=>$hoy,
            'updated_at'=>$hoy
        ]);
        $eq2 = DB::table('equipos')->insertGetId([
            'marca_id' => $marcaHP,
            'serial' => 'SN-HP-'.rand(100,999),
            'modelo' => 'DeskJet 2720',
            'tipo' => 'impresora',
            'observacion' => '',
            'created_at'=>$hoy,
            'updated_at'=>$hoy
        ]);

        $cliente1 = DB::table('clientes')->orderBy('id','asc')->first();
        $tecnico1 = DB::table('tecnicos')->orderBy('id','asc')->first();
        $estadoRecibido = DB::table('servicio_estados')->where('clave','recibido')->first();

        if ($cliente1 && $tecnico1 && $estadoRecibido) {
            for ($i = 1; $i <= 3; $i++) {
                $folio = 'S-'.date('Ymd').'-'.str_pad($i, 4, '0', STR_PAD_LEFT);

                $existe = DB::table('servicios')->where('folio', $folio)->first();
                if ($existe) {
                    continue;
                }

                $servicioId = DB::table('servicios')->insertGetId([
                    'folio' => $folio,
                    'cliente_id' => $cliente1->id,
                    'equipo_id' => $i % 2 == 0 ? $eq2 : $eq1,
                    'tecnico_id' => $tecnico1->id,
                    'estado_actual_id' => $estadoRecibido->id,
                    'fecha_recibido' => $hoy,
                    'problema_informado' => 'No enciende',
                    'diagnostico' => null,
                    'trabajo_realizado' => null,
                    'precio_estimado' => null,
                    'total' => null,
                    'created_at'=>$hoy,
                    'updated_at'=>$hoy
                ]);

                DB::table('servicio_estado_hist')->insert([
                    'servicio_id'=>$servicioId,
                    'estado_id'=>$estadoRecibido->id,
                    'cambiado_por_tecnico_id'=>$tecnico1->id,
                    'fecha_cambio'=>$hoy,
                    'nota'=>'Ingreso inicial',
                ]);
            }
        }
    }
}
