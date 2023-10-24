@extends('admin.layout')

@section('admin.content')
    <div class="content-wrapper" style="min-height: 909px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Registrar Gastos</h1>
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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Registrar gasto</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('gastos.store') }}" method="post">
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
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Tipos de Gasto:</label>
                                                <select id="GastosSelect" name="tipo_gastos" class="form-control">
                                                    <option value="Combustível">Combustível</option>
                                                    <option value="Manutenção">Manutenção</option>
                                                    <option value="Outros">Outros</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Valor:</label>
                                                <input id="inptValor" type="text" class="form-control" value="{{ old('valor') }}"
                                                    name="valor" placeholder="Digite o valor gastado..."
                                                    onkeyup="formatarMoeda(this)" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label id="labeltLitros" for="inputLitros">Litros:</label>
                                                <input id="inputLitros" type="text" class="form-control" value="{{ old('litros') }}"
                                                    name="litros" onkeyup="formatarLitros(this)" required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Data:</label>
                                                <input id="dataHoraRegistro" type="datetime-local" class="form-control" value="{{ old('data_registro')}}"
                                                name="data_registro" required>
                                              </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Descrição:</label>
                                                <textarea name="descricao" class="form-control" rows="3" placeholder="Descreva aqui..."></textarea>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Lançar</button>
                                </div>
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

    <script src="{{ asset('js/axios.min.js') }}"></script>
    <script src="{{ asset('js/admin/gastos/cadastrar.js') }}"></script>

@endsection
