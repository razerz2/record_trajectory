<?php

namespace App\Http\Controllers;

use App\gastos;
use App\userVeiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos = DB::table('gastos')
        ->where('gastos.user_id', Auth::user()->id)
        ->join('users', 'gastos.user_id', '=', 'users.id')
        ->join('veiculo', 'gastos.veiculo_id', '=', 'veiculo.id_veiculo')
        ->select('gastos.id_gasto', 'users.name as nome_usuario', 'veiculo.modelo as nome_veiculo', 'gastos.tipo_gastos', 'gastos.valor', 'gastos.data_registro')
        ->get();

         return view('colaboradores.despesas.listar', compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $veiculos = userVeiculo::where('user_id', Auth::user()->id)
        ->join('veiculo', 'user_veiculo.veiculo_id', '=', 'veiculo.id_veiculo')
        ->select('user_veiculo.*', 'veiculo.modelo as nome_veiculo')
        ->get();

        return view('colaboradores.despesas.cadastrar', compact('veiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $data['valor'] = $this->converterParaFloat($data['valor']);
        $data['litros'] = floatval($data['litros']);
        $data['data_registro'] =  date('Y-m-d H:i:s', Carbon::parse($data['data_registro'])->timestamp);
        $recovery = gastos::create($data);

        return redirect()->route('despesas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gastos = DB::table('gastos')
        ->join('users', 'gastos.user_id', '=', 'users.id')
        ->join('veiculo', 'gastos.veiculo_id', '=', 'veiculo.id_veiculo')
        ->where('gastos.id_gasto', $id)  // Adicionando o where
        ->select('gastos.*', 'users.name as nome_usuario', 'veiculo.modelo as nome_veiculo')
        ->get();

        $gasto = $gastos[0];

        return view('colaboradores.despesas.show', compact('gasto'));
    }

    function converterParaFloat($valor)
    {
        // Remove todos os caracteres que não são dígitos, ponto ou vírgula
        $valor_limpo = preg_replace("/[^\d.,]/", "", $valor);

        // Substitui a vírgula por ponto (para o formato correto)
        $valor_limpo = str_replace(',', '.', $valor_limpo);

        // Remove todos os pontos, exceto o último
        $valor_limpo = preg_replace('/\.(?=.*\.)/', '', $valor_limpo);

        // Converte para float
        return floatval($valor_limpo);
    }
}
