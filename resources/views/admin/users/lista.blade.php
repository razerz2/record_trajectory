@extends('admin.layout')

@section('admin.content')
    <div class="content-wrapper " style="min-height: 909px;">

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Lista de Usuários</h1>
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
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Lista de Usuários
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <table id="sua-tabela" width="100%"
                                    class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Email</th>
                                            <th>Tipo de Conta</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usuarios as $usuario)
                                            <tr>
                                                <td>{{ $usuario->id }}</td>
                                                <td>{{ $usuario->name }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>
                                                    @if ($usuario->isAdmin)
                                                        <p>Administrador</p>
                                                    @else
                                                        <p>Colaborador</p>
                                                    @endif
                                                </td>
                                                <td align="center">
                                                    <a href="{{ route('usuarios.edit', ['usuario' => $usuario->id]) }}"
                                                        class="btn btn-primary"> <i class="fa fa-edit"></i> Editar </a>
                                                    <a href="{{ route('usuarios.editPassword', ['usuario' => $usuario->id]) }}"
                                                        class="btn btn-secondary"> <i class="fa-solid fa-key"></i> Change </a>
                                                    <button data-toggle="modal" data-target="#delete" class="btn btn-danger"
                                                        onclick="deletar_modal({{ $usuario->id }}, '{{ $usuario->name }}');">
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
                                <h4 class="modal-title text-center" id="myModalLabel">Deseja excluir?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <form action="{{ route('usuarios.desativar', ['usuario' => $usuario->id]) }}" method="POST">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <p class="text-center">
                                        Tem certeza de que deseja excluir "<span id="info-name"></span>"?
                                    </p>
                                    <input type="hidden" name="id_usuario" id="id_usuario" value="">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-danger">Desativar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <script>
                    $(function() {
                        $("#sua-tabela").DataTable({
                            "responsive": true,
                            "lengthChange": false,
                            "autoWidth": false,
                            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                            "responsive": true,
                        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        $('#sua-tabela').DataTable({
                            "paging": true,
                            "lengthChange": false,
                            "searching": false,
                            "ordering": true,
                            "info": true,
                            "autoWidth": false,
                            "responsive": true,
                        });
                    });

                    function deletar_modal(id_usuario, nome_usuario) {
                        document.getElementById('id_usuario').value = id_usuario;
                        document.getElementById('info-name').innerText = nome_usuario;
                    };
                </script>
                <!-- /.row -->
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
