@extends('admin.layout')

@section('admin.content')
    <div class="content-wrapper" style="min-height: 909px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Visualizar Corrida</h1>
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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Visualizar Corrida Nº {{$percurso->id_percurso}}</h3>
                            </div>
                            <!-- /.card-header -->
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
                                            <label for="exampleInputEmail1">Usuário:</label>
                                            <input align="center" type="text" class="form-control"
                                                value="{{ $percurso->nome_usuario }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Veículo:</label>
                                            <input align="center" type="text" class="form-control"
                                                value="{{ $percurso->nome_veiculo }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">kM Inicial:</label>
                                            <input align="center" type="number" class="form-control"
                                                value="{{ $percurso->km_inicial }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div align="center" class="form-group">
                                            <label for="exampleInputEmail1">KM Final:</label>
                                            <input type="text" class="form-control" value="{{ $percurso->km_final }}"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div align="center" class="form-group">
                                            <label for="exampleInputEmail1">KM Percorrido:</label>
                                            <input type="text" class="form-control"
                                                value="{{ $percurso->km_percorrido }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div align="center" class="form-group">
                                            <label for="exampleInputEmail1">Data da Corrida:</label>
                                            <input type="text" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($percurso->data_registro)->format('d/m/Y H:i:s') }}"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Observação:</label>
                                            <textarea name="observacao" class="form-control" rows="3" placeholder="Comente aqui..." readonly>
                                                {{ $percurso->observacao }}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-title">Locais</h5>
                                            </div>
                                            <div class="card-body">
                                                <table width="100%"
                                                    class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th align="center">#</th>
                                                            <th align="center">Nome do local</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($locais as $index => $local)
                                                            <tr>
                                                                <td align="center">{{ $loop->iteration }}</td>
                                                                <td align="center">{{ $local->nome_local }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
