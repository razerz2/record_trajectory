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
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Usuários Registrados</span>
                                <span class="info-box-number">
                                    {{ $data['qtd_users'] }}
                                </span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fa-solid fa-car-side"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Veículos Registrados</span>
                                <span class="info-box-number">{{ $data['qtd_veiculos'] }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
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
                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
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
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-location-dot"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Locais Registrados</span>
                                <span class="info-box-number">{{ $data['qtd_locais'] }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i
                                    class="nav-icon fas fa-map-location-dot"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Visitas Registradas</span>
                                <span class="info-box-number">{{ $data['soma_visitas'] }}</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fa-solid fa-bell"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Alertas Ativos</span>
                                <span class="info-box-number">0</span>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <div class="col-md-8">
                        <!-- TABLE: LATEST ORDERS -->
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Ultimos Trajetos Registrados</h3>

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
                                                <th>Usuário</th>
                                                <th>Veículo</th>
                                                <th>KM Percorrido</th>
                                                <th>Data</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($percursos as $percurso)
                                                <tr>
                                                    <td>{{ $percurso->id_percurso }}</td>
                                                    <td>{{ $percurso->nome_usuario }}</td>
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
                              <a href="{{route('percursos.create')}}" class="btn btn-sm btn-info float-left">Novo Registro</a>
                              <a href="{{route('percursos.index')}}" class="btn btn-sm btn-secondary float-right">Ver Todos</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Browser Usage</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="chart-responsive">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="pieChart" height="167" width="334"
                                                style="display: block; width: 334px; height: 167px;"
                                                class="chartjs-render-monitor"></canvas>
                                        </div>
                                        <!-- ./chart-responsive -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-4">
                                        <ul class="chart-legend clearfix">
                                            <li><i class="far fa-circle text-danger"></i> Chrome</li>
                                            <li><i class="far fa-circle text-success"></i> IE</li>
                                            <li><i class="far fa-circle text-warning"></i> FireFox</li>
                                            <li><i class="far fa-circle text-info"></i> Safari</li>
                                            <li><i class="far fa-circle text-primary"></i> Opera</li>
                                            <li><i class="far fa-circle text-secondary"></i> Navigator</li>
                                        </ul>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer p-0">
                                <ul class="nav nav-pills flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            United States of America
                                            <span class="float-right text-danger">
                                                <i class="fas fa-arrow-down text-sm"></i>
                                                12%</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            India
                                            <span class="float-right text-success">
                                                <i class="fas fa-arrow-up text-sm"></i> 4%
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            China
                                            <span class="float-right text-warning">
                                                <i class="fas fa-arrow-left text-sm"></i> 0%
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.footer -->
                        </div>
                        <!-- /.card -->

                        <!-- PRODUCT LIST -->
                        <div class="card" style="display: none;">
                            <div class="card-header">
                                <h3 class="card-title">Recently Added Products</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <ul class="products-list product-list-in-card pl-2 pr-2">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image"
                                                class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Samsung TV
                                                <span class="badge badge-warning float-right">$1800</span></a>
                                            <span class="product-description">
                                                Samsung 32" 1080p 60Hz LED Smart HDTV.
                                            </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image"
                                                class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Bicycle
                                                <span class="badge badge-info float-right">$700</span></a>
                                            <span class="product-description">
                                                26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                            </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image"
                                                class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">
                                                Xbox One <span class="badge badge-danger float-right">
                                                    $350
                                                </span>
                                            </a>
                                            <span class="product-description">
                                                Xbox One Console Bundle with Halo Master Chief Collection.
                                            </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="dist/img/default-150x150.png" alt="Product Image"
                                                class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">PlayStation 4
                                                <span class="badge badge-success float-right">$399</span></a>
                                            <span class="product-description">
                                                PlayStation 4 500GB Console (PS4)
                                            </span>
                                        </div>
                                    </li>
                                    <!-- /.item -->
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">View All Products</a>
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
