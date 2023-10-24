@extends('admin.layout')

@section('admin.content')
    <div class="content-wrapper" style="min-height: 909px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cadastro de Locais</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Locais</li>
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
                                <h3 class="card-title">Cadastrar Local</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('locais.store') }}" method="post">
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nome do Local:</label>
                                                <input type="text" class="form-control" value="{{ old('nome_local') }}"
                                                    name="nome_local" placeholder="Digite o nome do Local..."
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Endereço:</label>
                                                <input type="text" class="form-control" value="{{ old('endereco') }}"
                                                    name="endereco" placeholder="Digite o endereço do Local..."
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nº Endereço</label>
                                                <input type="text" class="form-control" value="{{ old('nome_local') }}"
                                                    name="n_endereco" placeholder="Digite o número do endereço..."
                                                    required>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Estado:</label>
                                                <select id="stateSelect" class="form-control" name="estado_id">
                                                    <option value="">Selecione um estado</option>
                                                    @foreach($estados as $estado)
                                                        <option value="{{ $estado->id_estado }}">{{ $estado->nome_estado }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cidades:</label>
                                                <select id="citySelect" class="form-control" name="cidade_id">
                                                    <option value="">Selecione uma cidade</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">CEP:</label>
                                                <input type="text" class="form-control" value="{{ old('CEP') }}"
                                                    name="CEP" placeholder="Digite o CEP do local..."
                                                    required>
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
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Adicione um evento de mudança para o seletor de estado
        $('#stateSelect').change(function() {
            var stateId = $(this).val();
            var baseUrl = '{{ url('/') }}';
            // Faça a chamada AJAX para obter as cidades do estado selecionado
            $.ajax({
                url: baseUrl +'/admin/getCidades/' + stateId,
                type: 'GET',
                success: function (response) {
                    var cities = response;
    
                    // Limpe as opções atuais
                    $('#citySelect').empty();
    
                    // Adicione as novas opções de cidade
                    $.each(cities, function(key, value) {
                        $('#citySelect').append('<option value="'+ value.id_cidade +'">'+ value.nome_cidade +'</option>');
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Erro ao obter as cidades:', error);
                    console.log('Status:', status);
                    console.log('XHR:', xhr);
                }
            });
        });
    </script>
@endsection
