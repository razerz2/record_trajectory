@extends('admin.layout')

@section('admin.content')
    <div class="content-wrapper" style="min-height: 909px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Registrar Corrida</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Percursos</li>
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
                                <h3 class="card-title">Registrar Corrida</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('percursos.store') }}" method="post">
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">KM de Partida:</label>
                                                <input id="kmAtualInput" type="number" class="form-control"
                                                    value="{{ old('km_inicial') }}" name="km_inicial" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">KM Final:</label>
                                                <input type="text" class="form-control" value="{{ old('km_final') }}"
                                                    name="km_final" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Data da Corrida:</label>
                                                <input id="dataHoraRegistro" type="datetime-local" class="form-control" value="{{ old('data_registro')}}"
                                                name="data_registro" required>
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
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg" style="margin-bottom: 10px;"><i
                                                            class="fa-solid fa-map-location-dot"></i> Adicionar
                                                        Local</button>

                                                    <table id="tabelaDestino" width="100%"
                                                        class="table table-striped table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Nome do local</th>
                                                                <th>Opções</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Observação:</label>
                                                <textarea name="observacao" class="form-control" rows="3" placeholder="Comente aqui..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <div id="modal-locais" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Selecione os locais do seu trajeto</h5>
                            </div>
                            <div class="card-body">
                                <table id="tabelaOrigem" width="100%"
                                    class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Selecionar</th>
                                            <th>Local</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($locais as $local)
                                            <tr>
                                                <td align="center" style="vertical-align: middle; width: 10%;">
                                                    <label hidden
                                                        for="ch{{ $local->id_local }}">{{ $local->nome_local }}</label>
                                                    <input id="ch{{ $local->id_local }}" type="checkbox"
                                                        class="form-check-label"
                                                        onclick="toggleCheckbox('{{ $local->id_local }}')" />
                                                </td>
                                                <td align="center">
                                                    {{ $local->nome_local }}
                                                    <input type="number" name="itens_locais[0]"
                                                        value="{{ $local->id_local }}" style="display:none;" />
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="footer" style="display: flex; justify-content: space-between;">
                                <button type="button" class="btn btn-secondary" style="margin: 20px;"
                                    onclick="uncheckAllCheckboxes()" data-dismiss="modal"><i class="fa-solid fa-x"></i>
                                    Cancelar</button>
                                <button type="button" class="btn btn-primary" style="margin: 20px;"
                                    onclick="copiarSegundaColuna();" data-dismiss="modal"><i
                                        class="fa-solid fa-plus"></i> Adicionar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/admin/trajetos/cadastrar.js')}}"></script>
    

@endsection
