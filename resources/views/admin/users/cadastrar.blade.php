@extends('admin.layout')

@section('admin.content')
    <div class="content-wrapper" style="min-height: 909px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Cadastro de Usuário</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Usuários</li>
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
                                <h3 class="card-title">Cadastrar usuário</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="userForm" action="{{ route('usuarios.store') }}" method="post" enctype="multipart/form-data">
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
                                                <label for="exampleInputEmail1">Foto de Perfil:</label>
                                                <div id="imageContainer" style="width: 150px; height: 150px;">
                                                    <img src="{{ asset('dist/img/user-default.jpg') }}"
                                                        style="width: 150px; height: 150px;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nome de Exibição:</label>
                                                <input type="text" class="form-control" value="{{ old('name') }}"
                                                    name="name" placeholder="Digite o nome de exibição do usuário..."
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Nome Completo:</label>
                                                <input type="text" class="form-control" value="{{ old('name_full') }}"
                                                    name="name_full" placeholder="Digite o nome completo do usuário..."
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Endereço de Email</label>
                                                <input type="email" class="form-control" value="{{ old('email') }}"
                                                    name="email" placeholder="Digite o e-mail do usuário..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo de Conta:</label>
                                                <select class="form-control" name="tipo_conta">
                                                    <option>Administrador</option>
                                                    <option>Colaborador</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Password</label>
                                                <input type="password" class="form-control" value="{{ old('password') }}"
                                                    name="password" placeholder="Digite a senha..." required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Confirmar Password</label>
                                                <input type="password" class="form-control"
                                                    value="{{ old('password_confirm') }}" name="password_confirmation"
                                                    placeholder="Confirme a senha..." required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputFile">Arquivo de Perfil</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input id="InputFile" type="file" class="custom-file-input"
                                                            name="InputFile">
                                                        <label class="custom-file-label" for="exampleInputFile">Buscar
                                                            arquivo...</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button class="input-group-text" type="button"
                                                            id="uploadButton">Carregar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        document.getElementById('uploadButton').addEventListener('click', function() {
                                            const imageInput = document.getElementById('InputFile');
                                            const imageContainer = document.getElementById('imageContainer');

                                            if (imageInput.files.length > 0) {
                                                const file = imageInput.files[0];

                                                if (file.type === 'image/jpeg') { // Verifica se o tipo do arquivo é JPEG (.jpg)
                                                    const reader = new FileReader();

                                                    reader.onload = function(e) {
                                                        const img = new Image();
                                                        img.src = e.target.result;
                                                        img.style.maxWidth = '150px'; // Defina o tamanho máximo da imagem
                                                        img.style.maxHeight = '150px'; // Defina o tamanho máximo da imagem
                                                        imageContainer.innerHTML = ''; // Limpa qualquer imagem anterior
                                                        imageContainer.appendChild(img);
                                                    };

                                                    reader.readAsDataURL(file);
                                                } else {
                                                    alert('Por favor, selecione um arquivo de imagem no formato .jpg.');
                                                }
                                            }
                                        });

                                        document.getElementById('userForm').addEventListener('submit', function(event) {
                                            const imageInput = document.getElementById('InputFile');
                                            if (imageInput.files.length > 0) {
                                                const file = imageInput.files[0];
                                                if (file.type !== 'image/jpeg') {
                                                    event.preventDefault(); // Impede o envio do formulário
                                                    alert('Por favor, selecione um arquivo de imagem no formato .jpg.');
                                                }
                                            }
                                        });
                                    </script>

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
@endsection
