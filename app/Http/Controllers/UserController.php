<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::where('status', '=', 'ativo')->get();
        
        return view('admin.users.lista', compact('usuarios'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexInativos()
    {
        $usuarios = User::where('status', '=', 'inativo')->get();

        return view('admin.users.listaInativos', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UsersRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        if ($data['tipo_conta'] == "Administrador") {
            $data['isAdmin'] = true;
        } else {
            $data['isAdmin'] = false;
        }
        $data['status'] = 'ativo';
        $recovery = User::create($data);

        return redirect()->route('usuarios.index');
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
        if (!($usuario = User::find($id))) {
            throw new ModelNotFoundException("Usuário não foi encontrado!");
        }

        return view('admin.users.editar', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword($id)
    {

        if(!($usuario = User::find($id))){
            throw new ModelNotFoundException("Usuário não foi encontrado!");
        }

        return view('admin.users.editarPassword', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UsersEditRequest $request, $id)
    {
        if(!($usuario = User::find($id))){
            throw new ModelNotFoundException("Usuário não foi encontrado!");
        }
        $data = $request->all();
        $usuario->fill($data);
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Update password the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Requests\UsersEditPassRequest $request, $id)
    {
        if(!($usuario = User::find($id))){
            throw new ModelNotFoundException("Usuário não foi encontrado!");
        }

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $usuario->fill($data);
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    public function desativar(Request $request)
    {
        $id = $request->id_usuario;
        
        if(!($usuario = User::find($id))){
            throw new ModelNotFoundException("Usuário não foi encontrado!");
        }
        $data = $request->all();
        $data['status'] = 'inativo';
        $usuario->fill($data);
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    public function ativar(Request $request)
    {
        $id = $request->id_usuario;
        
        if(!($usuario = User::find($id))){
            throw new ModelNotFoundException("Usuário não foi encontrado!");
        }
        $data = $request->all();
        $data['status'] = 'ativo';
        $usuario->fill($data);
        $usuario->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //...
    }
}
