<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDeGastosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nome_gasto' => 'combustível'],
            ['nome_gasto' => 'manutenção']
        ];

        DB::table('tipo_gastos')->insert($data);
    }
}
