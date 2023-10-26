<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeAdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];
        $data['qtd_users'] = $this->qtdUsers();
        $data['qtd_veiculos'] = $this->qtdVeiculos();
        $data['qtd_locais'] = $this->qtdLocais();
        $data['soma_km'] = $this->somaKM();
        $data['soma_gastos'] = $this->somaGastos();
        $data['soma_visitas'] = $this->somaVisitas();
        $data_grafico = $this->graficoVeiculosKM();

        $percursos = $this->ultimosPercursos();
        
        return view('admin.index', compact('data', 'data_grafico', 'percursos'));

        //return dd($data_grafico);
    }

    public function qtdUsers()
    {
        $qtd = DB::table('users')
        ->count();

        return $qtd;
    }

    public function qtdVeiculos()
    {
        $qtd = DB::table('veiculo')
        ->count();

        return $qtd;
    }

    public function qtdLocais()
    {
        $qtd = DB::table('locais')
        ->count();

        return $qtd;
    }

    public function somaKM()
    {
        $total = DB::table('percurso')
        ->sum('km_percorrido');

        return $total;
    }

    public function somaGastos()
    {
        $total = DB::table('percurso')
        ->sum('km_percorrido');

        return $total;
    }

    public function somaVisitas()
    {
        $total = DB::table('locais')
        ->sum('n_visitas');

        return $total;
    }

    public function ultimosPercursos(){
        $percursos = DB::table('percurso')
        ->join('users', 'percurso.user_id', '=', 'users.id')
        ->join('veiculo', 'percurso.veiculo_id', '=', 'veiculo.id_veiculo')
        ->select('percurso.*', 'percurso.id_percurso', 'users.name as nome_usuario','veiculo.modelo as nome_veiculo')
        ->limit(10) // Limita o resultado a 10 registros
        ->get();

        return $percursos;
    }

    public function graficoVeiculosKM()
    {
        $dados = [];
        $veiculos = DB::table('veiculo')->select('veiculo.*')->get();
        foreach ($veiculos as $veiculo) {
            $dados[] = [
                'label' => $veiculo->modelo,
                'valor' => (int) DB::table('percurso')->where('veiculo_id', $veiculo->id_veiculo)->sum('km_percorrido')
            ];
        }

        return $dados;
    }

}
