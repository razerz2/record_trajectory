@extends('colaboradores.layout')

@section('colaboradores.content')
    <div class="content-wrapper" style="min-height: 909px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Visualizar Despesa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Despesas</li>
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
                                <h3 class="card-title">Visualizar Despesas Nº {{$gasto->id_gasto}}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form >
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Usuários:</label>
                                                <input type="text" class="form-control" value="{{ $gasto->nome_usuario }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Veículo:</label>
                                                <input type="text" class="form-control" value="{{ $gasto->nome_veiculo }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tipo de Gasto:</label>
                                                <input type="text" class="form-control" value="{{ $gasto->tipo_gastos }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Valor:</label>
                                                <input type="text" class="form-control" value="R$ {{number_format($gasto->valor, 2, ',', '.')}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Litros:</label>
                                                <input type="text" class="form-control" value="LT {{ $gasto->litros }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Data:</label>
                                                <input type="text" class="form-control" value="{{ \Carbon\Carbon::parse($gasto->data_registro)->format('d/m/Y H:i') }}" readonly>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descrição:</label>
                                                <textarea name="descricao" class="form-control" rows="3" readonly>{{ $gasto->descricao }}</textarea>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>
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
