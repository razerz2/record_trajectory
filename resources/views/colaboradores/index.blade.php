@extends('colaboradores.layout')

@section('colaboradores.content')
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
                        <h1 class="m-0">Painel Informativo</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Dashboard</li>
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
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-car-side"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Meus Veículos</span>
                                <span class="info-box-number">{{ $data['qtd_veiculos'] }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-road"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">KM's Percorrido</span>
                                <span class="info-box-number">{{ number_format($data['soma_km'], 0, ',', '.') }} KM's</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-4">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fa-solid fa-sack-dollar"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Total de Gastos</span>
                                <span
                                    class="info-box-number">R${{ number_format($data['soma_gastos'], 2, ',', '.') }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>
                </div>
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-12">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Ultimos Trajetos Lançados</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Veículo</th>
                                                <th>KM Percorrido</th>
                                                <th>Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          @foreach ($percursos as $percurso)
                                            <tr>
                                                <td>{{ $percurso->id_percurso }}</td>
                                                <td>{{ $percurso->nome_veiculo }}</td>
                                                <td>{{ $percurso->km_percorrido }} KM's</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($percurso->data_registro)->format('d/m/Y H:i:s') }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <a href="{{route('trajetos.create')}}" class="btn btn-sm btn-info float-left">Novo Registro</a>
                                <a href="{{route('trajetos.index')}}" class="btn btn-sm btn-secondary float-right">Ver Todos</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
