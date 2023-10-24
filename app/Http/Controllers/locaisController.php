<?php

namespace App\Http\Controllers;

use App\locais;
use App\estados;
use App\cidades;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class locaisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locais = locais::all();
        return view('admin.locais.listar', compact('locais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados = estados::all();
        return view('admin.locais.cadastrar', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\LocaisRequest $request)
    {
        $data = $request->all();
        $data['n_endereco'] = (int)$data['n_endereco'];
        $data['estado_id'] = (int)$data['estado_id'];
        $data['cidade_id'] = (int)$data['cidade_id'];
        $data['CEP'] = preg_replace("/[^a-zA-Z0-9]/", "", $data['CEP']);
        $data['CEP'] = (int)$data['CEP'];
        $data['n_visitas'] = 0; 
        $recovery = locais::create($data);

        return redirect()->route('locais.index');

        //return dd($data);
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
        if (!($local = locais::find($id))) {
            throw new ModelNotFoundException("Usuário não foi encontrado!");
        }
        $estados = estados::all();
        $cidade = cidades::find($local->cidade_id);

        //return dd($cidade);

        return view('admin.locais.editar', compact('local', 'estados', 'cidade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\LocaisRequest $request, $id)
    {
        if(!($local = locais::find($id))){
            throw new ModelNotFoundException("Local não foi encontrado!");
        }
        $data = $request->all();
        $local->fill($data);
        $local->save();

        return redirect()->route('locais.index');
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
            $local = locais::find($id);

            if (!$local) {
                return redirect()->route('locais.index')->with('error', 'Local não encontrado.');
            }

            $percursoLocaisCount = DB::table('percurso_local')
            ->where('local_id', $local->id_local)
            ->count();

            
            if ($percursoLocaisCount > 0) {
                return redirect()->route('locais.index')->with('error', 'Não é possível excluir o local, pois existem registros em percurso_locais associados a ele.');
            }

            $local->delete();

            return redirect()->route('locais.index');

        } catch (\Exception $e) {
            return redirect()->route('locais.index')->with('error', 'Ocorreu um erro ao excluir o local: ' . $e->getMessage());
        }
    }




}
