@extends('colaboradores.layout')

@section('colaboradores.content')
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
                        <h1 class="m-0">Seus Trajetos</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Trajetos</li>
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
                                Lista de Trajetos
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table id="sua-tabela" width="100%"
                                    class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Veículo</th>
                                            <th>KM Percorrido</th>
                                            <th>Data</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($percursos as $percurso)
                                            <tr>
                                                <td align="center">{{ $percurso->id_percurso }}</td>
                                                <td align="center">{{ $percurso->nome_veiculo }}</td>
                                                <td align="center">{{ $percurso->km_percorrido }} KM's</td>
                                                <td align="center">
                                                    {{ \Carbon\Carbon::parse($percurso->data_registro)->format('d/m/Y H:i:s') }}
                                                </td>
                                                <td align="center">
                                                    <a href="{{ route('trajetos.show', ['trajetos' => $percurso->id_percurso]) }}"
                                                        class="btn btn-primary"> <i class="fa fa-eye"></i> Ver </a>                                                    
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
                <script src="{{asset('js/colaboradores/trajetos/listar.js')}}"></script>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
