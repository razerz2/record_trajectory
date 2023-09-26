<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ["id_estado" => "01", "uf" => "AC", "nome_estado" => "Acre"],
            ["id_estado" => "02", "uf" => "AL", "nome_estado" => "Alagoas"],
            ["id_estado" => "03", "uf" => "AM", "nome_estado" => "Amazonas"],
            ["id_estado" => "04", "uf" => "AP", "nome_estado" => "Amapá"],
            ["id_estado" => "05", "uf" => "BA", "nome_estado" => "Bahia"],
            ["id_estado" => "06", "uf" => "CE", "nome_estado" => "Ceará"],
            ["id_estado" => "07", "uf" => "DF", "nome_estado" => "Distrito Federal"],
            ["id_estado" => "08", "uf" => "ES", "nome_estado" => "Espírito Santo"],
            ["id_estado" => "09", "uf" => "GO", "nome_estado" => "Goiás"],
            ["id_estado" => "10", "uf" => "MA", "nome_estado" => "Maranhão"],
            ["id_estado" => "11", "uf" => "MG", "nome_estado" => "Minas Gerais"],
            ["id_estado" => "12", "uf" => "MS", "nome_estado" => "Mato Grosso do Sul"],
            ["id_estado" => "13", "uf" => "MT", "nome_estado" => "Mato Grosso"],
            ["id_estado" => "14", "uf" => "PA", "nome_estado" => "Pará"],
            ["id_estado" => "15", "uf" => "PB", "nome_estado" => "Paraíba"],
            ["id_estado" => "16", "uf" => "PE", "nome_estado" => "Pernambuco"],
            ["id_estado" => "17", "uf" => "PI", "nome_estado" => "Piauí"],
            ["id_estado" => "18", "uf" => "PR", "nome_estado" => "Paraná"],
            ["id_estado" => "19", "uf" => "RJ", "nome_estado" => "Rio de Janeiro"],
            ["id_estado" => "20", "uf" => "RN", "nome_estado" => "Rio Grande do Norte"],
            ["id_estado" => "21", "uf" => "RO", "nome_estado" => "Rondônia"],
            ["id_estado" => "22", "uf" => "RR", "nome_estado" => "Roraima"],
            ["id_estado" => "23", "uf" => "RS", "nome_estado" => "Rio Grande do Sul"],
            ["id_estado" => "24", "uf" => "SC", "nome_estado" => "Santa Catarina"],
            ["id_estado" => "25", "uf" => "SE", "nome_estado" => "Sergipe"],
            ["id_estado" => "26", "uf" => "SP", "nome_estado" => "São Paulo"],
            ["id_estado" => "27", "uf" => "TO", "nome_estado" => "Tocantins"]
        ];

        DB::table('estados')->insert($data);
        
    }
}
