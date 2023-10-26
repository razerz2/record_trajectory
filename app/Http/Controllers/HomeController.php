<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id_user = Auth::user()->id;

        $data = [];
        $data['qtd_veiculos'] = $this->qtdVeiculosUsuario($id_user);
        $data['soma_km'] = $this->somaKMUsuario($id_user);
        $data['soma_gastos'] = $this->somagastos($id_user);

        $percursos = $this->trajetosUsuario($id_user);

        return view('colaboradores.index', compact('data', 'percursos'));
    }

    public function qtdVeiculosUsuario($userId)
    {
        $qtd = DB::table('user_veiculo')
        ->where('user_id', $userId)
        ->count();

        return $qtd;
    }

    public function somaKMUsuario($userId)
    {
        $total = DB::table('percurso')
        ->where('user_id', $userId)
        ->sum('km_percorrido');

        return $total;
    }

    public function somaGastos($userId)
    {
        $total = DB::table('gastos')
        ->where('user_id', $userId)
        ->sum('valor');

        return $total;
    }

    public function trajetosUsuario($userId)
    {
        $percursos = DB::table('percurso')
        ->where('user_id', $userId)
        ->join('veiculo', 'percurso.veiculo_id', '=', 'veiculo.id_veiculo')
        ->select('percurso.*', 'percurso.id_percurso', 'veiculo.modelo as nome_veiculo')
        ->limit(10) // Limita o resultado a 10 registros
        ->get();

        return $percursos;
    }




}
