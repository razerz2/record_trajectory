@extends('admin.layout')

@section('admin.content')
    <div class="content-wrapper " style="min-height: 909px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Lista de Veículos</h1>
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
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de Veículos
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table id="sua-tabela" width="100%"
                                    class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Placa</th>
                                            <th>KM Atual</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($veiculos as $veiculo)
                                            <tr>
                                                <td>{{ $veiculo->id_veiculo }}</td>
                                                <td>{{ $veiculo->marca }}</td>
                                                <td>{{ $veiculo->modelo }}</td>
                                                <td>{{ $veiculo->placa }}</td>
                                                <td>{{ $veiculo->km_atual }}</td>
                                                <td align="center">
                                                    <a href="{{ route('veiculos.edit', ['veiculo' => $veiculo->id_veiculo]) }}"
                                                        class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> Editar </a>
                                                    <button data-toggle="modal" data-target="#delete" class="btn btn-danger btn-sm"
                                                        onclick="deletar_modal({{ $veiculo->id_veiculo }}, '{{ $veiculo->modelo }}');">
                                                        <i class="fa fa-trash"></i> Desativar </button>
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
                                <h4 class="modal-title text-center" id="myModalLabel">Deseja desativar?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="{{ route('veiculos.desativar') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <p class="text-center">
                                        Tem certeza de que deseja desativar "<span id="info-name"></span>"?
                                    </p>
                                    <input type="hidden" name="id_veiculo" id="id_veiculo" value="">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Desativar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script src="{{asset('js/admin/veiculos/listar.js')}}"></script>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
