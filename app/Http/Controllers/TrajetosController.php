<?php

namespace App\Http\Controllers;

use App\locais;
use App\veiculo;
use App\userVeiculo;
use App\percurso;
use App\percursoLocal;
use App\gastos;
use App\gastosPercurso;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TrajetosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $percursos = DB::table('percurso')
        ->where('user_id', Auth::user()->id)
        ->join('veiculo', 'percurso.veiculo_id', '=', 'veiculo.id_veiculo')
        ->select('percurso.*', 'percurso.id_percurso', 'veiculo.modelo as nome_veiculo')
        ->get();

        return view('colaboradores.trajetos.listar', compact('percursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locais = locais::all();
        $veiculos = userVeiculo::where('user_id', Auth::user()->id)
        ->join('veiculo', 'user_veiculo.veiculo_id', '=', 'veiculo.id_veiculo')
        ->select('user_veiculo.*', 'veiculo.modelo as nome_veiculo')
        ->get();

        return view('colaboradores.trajetos.cadastrar', compact('locais', 'veiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\percursoRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        //Calcula a kilometragem percorrida...
        $data['km_percorrido'] = $data['km_final'] - $data['km_inicial'];
        //Salva as informações de data e hora em timestamp...
        $data['data_registro'] =  date('Y-m-d H:i:s', Carbon::parse($data['data_registro'])->timestamp);
        //Salva os dados do Percurso
        $recovery = percurso::create($data);
        $id_generator = $recovery->id_percurso;
        //Salvos os locais visitados durante o percurso
        foreach ($data['itens_locais'] as $index => $item) {
            percursoLocal::create([
                'percurso_id' => $id_generator,
                'local_id' => $item,
                'order' => $index,  // Adiciona o índice ao banco de dados
            ]);
        
            // Atualiza o número de visitas do local registrado...
            $this->atualizaNVisitasLocal($item);
        }
        
        //Atualiza o kM Atual do veículo...
        $this->atualizaKMAtual($data['veiculo_id'], $data['km_percorrido']);

        //Associa Percurso ao gasto de combustível...
        $this->associaGastoPercurso($id_generator, $data['veiculo_id']);
        
        return redirect()->route('trajetos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $percursos = DB::table('percurso')
        ->join('users', 'percurso.user_id', '=', 'users.id')
        ->join('veiculo', 'percurso.veiculo_id', '=', 'veiculo.id_veiculo')
        ->where('percurso.id_percurso', $id)  // Adicionando o where
        ->select('percurso.*', 'users.name as nome_usuario', 'veiculo.modelo as nome_veiculo')
        ->get();

        $percurso = $percursos[0];
        
        $locais = percursoLocal::where('percurso_id', $id)
        ->join('locais', 'percurso_local.local_id', '=', 'locais.id_local')  // INNER JOIN com locais
        ->select('percurso_local.local_id','locais.nome_local')  // Selecione os campos desejados da tabela 'locais'
        ->orderBy('order')
        ->get();

        return view('colaboradores.trajetos.show', compact('percurso', 'locais'));
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
        //
    }

    public function atualizaKMAtual($id_veiculo, $km_percorrido){

        $veiculo = veiculo::find($id_veiculo);
        $veiculo->km_atual = $veiculo->km_atual + $km_percorrido;
        $veiculo->save();

    }

    public function atualizaNVisitasLocal($id_local){

        $local = locais::find($id_local);
        $local->n_visitas = $local->n_visitas + 1;
        $local->save();
        
    }

    public function associaGastoPercurso($id_percurso, $id_veiculo)
    {
        $id_gasto = $this->ultimoGastoLançado($id_veiculo);

        if ($id_gasto != 0) {
            gastosPercurso::create([
                'gasto_id' => $id_gasto,
                'percurso_id' => $id_percurso,
                'veiculo_id' => $id_veiculo
            ]);
        }

    }

    public function ultimoGastoLançado($id_veiculo){
        $ultimoGasto = gastos::where('veiculo_id', $id_veiculo)
        ->where('tipo_gastos', 'Combustível')
        ->latest('data_registro')
        ->first();

        if(!$ultimoGasto){
            return 0;
        }

        return $ultimoGasto->id_gasto;
    }
}
