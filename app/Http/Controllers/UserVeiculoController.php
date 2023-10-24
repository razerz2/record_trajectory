<?php

namespace App\Http\Controllers;

use App\User;
use App\userVeiculo;
use App\veiculo;
use App\Http\Requests;
use Illuminate\Http\Request;

class UserVeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('userVeiculos.create');
    }

    public function getVeiculosForUser($id)
    {
        // Obtenha o usuário
        $user = User::findOrFail($id);

        // Obtenha os veículos associados a esse usuário
        $veiculos = $user->veiculos()->select('id_veiculo', 'modelo', 'km_atual')->get();

        return response()->json($veiculos);
    }

    public function getVeiculosNotAssociados($id)
    {
        
        // Obtém os veículos que não estão associados ao usuário
        $veiculos = veiculo::whereDoesntHave('users', function ($query) use ($id) {
            $query->where('user_id', $id);
        })->orderBy('modelo')->get();

        return response()->json($veiculos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('status', '=', 'ativo')->get();
        $userVeiculos = UserVeiculo::leftJoin('users', 'user_veiculo.user_id', '=', 'users.id')
        ->leftJoin('veiculo', 'user_veiculo.veiculo_id', '=', 'veiculo.id_veiculo')
        ->select('user_veiculo.id_uv', 'users.name as nome_usuario', 'veiculo.modelo as nome_veiculo')
        ->get();

        return view('admin.veiculos.associar', compact('users', 'userVeiculos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserVeiculoRequest $request)
    {
        $data = $request->all();
        userVeiculo::create($data);

        return redirect()->route('userVeiculos.create');
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
            $userVeiculo = UserVeiculo::findOrFail($id);  // Encontra o registro pelo ID

            // Verifica se o registro foi encontrado
            if ($userVeiculo) {
                $userVeiculo->delete();  // Exclui o registro
                return redirect()->route('userVeiculos.create');
            } else {
                return redirect()->route('userVeiculos.create')->with('error', 'Registro não encontrado.');
            }
        } catch (\Exception $e) {
            return redirect()->route('userVeiculos.create')->with('error', 'Ocorreu um erro ao excluir o registro.');
        }
    }

}
