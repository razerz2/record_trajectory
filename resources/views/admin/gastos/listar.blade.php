@extends('admin.layout')

@section('admin.content')
    <div class="content-wrapper " style="min-height: 909px;">

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
                        <h1 class="m-0">Lista de Gastos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Gastos</li>
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
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de Gastos Registrados
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table id="sua-tabela" width="100%"
                                    class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Usuário</th>
                                            <th>Veículo</th>
                                            <th>Tipo de Gastos</th>
                                            <th>Valor</th>
                                            <th>Data</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gastos as $gasto)
                                            <tr>
                                                <td align="center">{{ $gasto->id_gasto }}</td>
                                                <td align="center">{{ $gasto->nome_usuario }}</td>
                                                <td align="center">{{ $gasto->nome_veiculo }}</td>
                                                <td align="center">{{ $gasto->tipo_gastos }}</td>
                                                <td align="center">R$ {{number_format($gasto->valor, 2, ',', '.')}}</td>
                                                <td align="center">
                                                    {{ \Carbon\Carbon::parse($gasto->data_registro)->format('d/m/Y H:i') }}
                                                </td>
                                                <td align="center">
                                                    <a href="{{ route('gastos.show', ['gastos' => $gasto->id_gasto]) }}"
                                                        class="btn btn-primary btn-sm"> <i class="fa fa-eye"></i> Ver </a>
                                                    <button data-toggle="modal" data-target="#delete" class="btn btn-danger btn-sm"
                                                        onclick="deletar_modal({{ $gasto->id_gasto }}, '{{ $gasto->id_gasto }}');">
                                                        <i class="fa fa-trash"></i> Excluir </button>

                                                    <form id="form{{ $gasto->id_gasto }}"
                                                        action="{{ route('gastos.destroy', ['gastos' => $gasto->id_gasto]) }}"
                                                        method="POST" hidden>
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- /.table-responsive -->

                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
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
                                <button type="button" class="btn btn-secondary" onclick="acionarSubmit();" data-dismiss="modal">Excluir</button>
                            </div>

                        </div>
                    </div>
                </div>
                <script src="{{asset('js/admin/gastos/listar.js')}}"></script>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
