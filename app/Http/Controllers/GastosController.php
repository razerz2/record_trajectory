<?php

namespace App\Http\Controllers;

use App\gastos;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GastosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos = DB::table('gastos')
        ->join('users', 'gastos.user_id', '=', 'users.id')
        ->join('veiculo', 'gastos.veiculo_id', '=', 'veiculo.id_veiculo')
        ->select('gastos.id_gasto', 'users.name as nome_usuario', 'veiculo.modelo as nome_veiculo', 'gastos.tipo_gastos', 'gastos.valor', 'gastos.data_registro')
        ->get();

         return view('admin.gastos.listar', compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('status', '=', 'ativo')->get();

        return view('admin.gastos.cadastrar', compact('users'));
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

        return redirect()->route('gastos.index');
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

        return view('admin.gastos.show', compact('gasto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $gasto = gastos::find($id);

            if (!$gasto) {
                return redirect()->route('gastos.index')->with('error', 'Gasto não encontrado!');
            }

            $gastosPercursoCount = DB::table('gastos_percurso')
            ->where('gasto_id', $gasto->id_gasto)
            ->count();

            
            if ($gastosPercursoCount > 0) {
                return redirect()->route('gastos.index')->with('error', 'Não é possível excluir o gasto, pois existem registros associados a ele.');
            }

            $gasto->delete();

            return redirect()->route('gastos.index');

        } catch (\Exception $e) {
            return redirect()->route('gastos.index')->with('error', 'Ocorreu um erro ao excluir gasto: ' . $e->getMessage());
        }
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
