@extends('admin.layout')

@section('admin.content')
    <div class="content-wrapper" style="min-height: 909px;">
        @if (session('error'))
            <div class="alert alert-danger" alert-dismissible fade show" role="alert">
                <strong><i class="fa-solid fa-triangle-exclamation"></i> Atenção, </strong> {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Associar Veículo</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Veículos</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Associar Veículo a um Usuário</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('userVeiculos.store') }}" method="post">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    @if ($errors->any())
                                        <ul class="alert alert-danger">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Usuários:</label>
                                                <select id="userSelect" name="user_id" class="form-control">
                                                    <option></option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Veículos:</label>
                                                <select id="vehicleSelect" name="veiculo_id" class="form-control">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer" align="center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-refresh"
                                            aria-hidden="true"></i> Associar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Veículos Associados a Usuários</h3>
                            </div>
                            <div class="card-body">
                                <table id="sua-tabela" width="100%"
                                    class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Usuário</th>
                                            <th>Veículo</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userVeiculos as $userVeiculo)
                                            <tr>
                                                <td>{{ $userVeiculo->id_uv }}</td>
                                                <td>{{ $userVeiculo->nome_usuario }}</td>
                                                <td>{{ $userVeiculo->nome_veiculo }}</td>
                                                <td align="center">
                                                    <button data-toggle="modal" data-target="#delete" class="btn btn-danger"
                                                        onclick="deletar_modal({{ $userVeiculo->id_uv }}, '{{ $userVeiculo->id_uv }}');">
                                                        <i class="fa fa-trash"></i> Excluir </button>

                                                    <form id="form{{ $userVeiculo->id_uv }}"
                                                        action="{{ route('userVeiculos.destroy', ['userVeiculos' => $userVeiculo->id_uv]) }}"
                                                        method="POST" hidden>
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header align-items-center">
                                <h4 class="modal-title text-center" id="myModalLabel">Deseja excluir?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <p class="text-center">
                                    Tem certeza de que deseja excluir o Registro Nº "<span id="info-name"></span>"?
                                </p>
                                <input type="hidden" id="id_registro" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-secondary" onclick="acionarSubmit();"
                                    data-dismiss="modal">Excluir</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>

    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/admin/veiculos/associar.js') }}"></script>


@endsection
