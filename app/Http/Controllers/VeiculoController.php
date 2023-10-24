<?php

namespace App\Http\Controllers;

use App\veiculo;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $veiculos = veiculo::where('status', '=', 'ativo')->get(); 
        return view('admin.veiculos.lista', compact('veiculos'));
    }

    public function indexInativos()
    {
        $veiculos = veiculo::where('status', '=', 'inativo')->get();
        return view('admin.veiculos.lista', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.veiculos.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\VeiculoRequest $request)
    {
        $data = $request->all();
        $data['km_atual'] = $data['km_inicial'];
        $data['status'] = 'ativo';
        $recovery = veiculo::create($data);

        return redirect()->route('veiculos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!($veiculo = veiculo::find($id))) {
            throw new ModelNotFoundException("Veículo não foi encontrado!");
        }

        return view('admin.veiculos.editar', compact('veiculo'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\VeiculoEditRequest $request, $id)
    {
        if(!($veiculo = veiculo::find($id))){
            throw new ModelNotFoundException("Veículo não foi encontrado!");
        }
        $data = $request->all();
        $veiculo->fill($data);
        $veiculo->save();

        return redirect()->route('veiculos.index');
    }

    public function desativar(Request $request)
    {
        
        $id = $request->id_veiculo;
        
        if(!($veiculo = veiculo::find($id))){
            throw new ModelNotFoundException("Veículo não foi encontrado!");
        }
        $data = $request->all();
        $data['status'] = 'inativo';
        $veiculo->fill($data);
        $veiculo->save();

        return redirect()->route('veiculos.index');
        
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

    public function obterKm($vehicleId)
    {
        // Suponhamos que você tenha um modelo chamado "Veiculo" que representa sua tabela de veículos.
        // Substitua "Veiculo" pelo nome do modelo correto e "km_atual" pelo nome do campo real na sua tabela.
        $veiculo = Veiculo::find($vehicleId);

        if (!$veiculo) {
            return response()->json(['error' => 'Veículo não encontrado'], 404);
        }

        return response()->json(['km_atual' => $veiculo->km_atual]);
    }

    
}
