@extends('template.default')

@section('title', 'Petflix')

@section('content')

<div class="container mt-5">
    <h1 class="mb-4">Painel de Administração</h1>

    <!-- Nav Tabs -->
    <ul class="nav nav-tabs" id="adminTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="usuarios-tab" data-bs-toggle="tab" data-bs-target="#usuarios"
                type="button" role="tab" aria-controls="usuarios" aria-selected="true">Usuários</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="diretores-tab" data-bs-toggle="tab" data-bs-target="#diretores" type="button"
                role="tab" aria-controls="diretores" aria-selected="false">Diretores</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="categorias-tab" data-bs-toggle="tab" data-bs-target="#categorias" type="button"
                role="tab" aria-controls="categorias" aria-selected="false">Categorias</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="obras-tab" data-bs-toggle="tab" data-bs-target="#obras" type="button"
                role="tab" aria-controls="obras" aria-selected="false">Obras Audiovisuais</button>
        </li>
    </ul>

    <!-- Tab Content -->
    <div class="tab-content mt-4" id="adminTabContent">
        <!-- Usuários Tab -->
        <div class="tab-pane fade show active" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
            <h3>Usuários</h3>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data de Nascimento</th>
                        <th>Plano</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->nome }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($usuario->dt_nascimento)->format('d/m/Y') }}</td>
                        <td>{{ $usuario->plano }}</td>
                        <td>
                            <a data-id="{{ $usuario->id }}" data-name="user" class='btn btn-primary edit-btn'>
                                <li class='fa fa-pencil'></li>
                            </a>
                            |
                            <a href='{{ route('user_ex',[ "id"=>$usuario->id ]) }}' class='btn btn-danger'>
                                <li class='fa fa-trash'></li>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Diretores Tab -->
        <div class="tab-pane fade" id="diretores" role="tabpanel" aria-labelledby="diretores-tab">
            <h3>Diretores</h3>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diretores as $diretor)
                    <tr>
                        <td>{{ $diretor->id }}</td>
                        <td>{{ $diretor->nome }}</td>
                        <td>
                            <a data-id="{{  $diretor->id }}" data-name="diretor" class='btn btn-primary edit-btn'>
                                <li class='fa fa-pencil'></li>
                            </a>
                            |
                            <a href='{{ route('diretor_ex',[ "id"=> $diretor->id ]) }}' class='btn btn-danger'>
                                <li class='fa fa-trash'></li>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Categorias Tab -->
        <div class="tab-pane fade" id="categorias" role="tabpanel" aria-labelledby="categorias-tab">
            <div style="display: flex;justify-content: space-between;align-items: center;">
                <h3>Categorias</h3>
                <button class='btn btn-success' data-name="categoria" id="add-btn">Novo <li class='fa fa-plus'></li>
                </button>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $category)
                    <tr>
                        <td scope="row">{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a data-id="{{ $category->id }}" data-name="categoria" class='btn btn-primary edit-btn'>
                                <li class='fa fa-pencil'></li>
                            </a>
                            |
                            <a href='{{ route('categoria_ex', [ "id"=> $category->id ]) }}' class='btn btn-danger'>
                                <li class='fa fa-trash'></li>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Obras Audiovisuais Tab -->
        <div class="tab-pane fade" id="obras" role="tabpanel" aria-labelledby="obras-tab">
            <h3>Obras Audiovisuais</h3>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th>Diretor</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($obras as $obra)
                    <tr>
                        <td>{{ $obra->id }}</td>
                        <td>{{ $obra->titulo }}</td>
                        <td>{{ $obra->descricao }}</td>
                        <td>{{ $obra->tipo }}</td>
                        <td>{{ $obra->diretor->nome }}</td>
                        <td>{{ $obra->categoria->name }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">Editar</a>
                            <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Adicionar Vídeo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!--Formulario categoria -->
                <form id="categoriaForm" method="POST" action="">
                    @csrf
                    <input type="hidden" name="id" id="categoria_id">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-dark text-white" id="nome_categoria" name="nome"
                            placeholder="Digite o nome da categoria">
                        <label for="floatingInput">Categoria</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" id="modal-submit-button">Salvar</button>
                    </div>
                </form>
                <!--Formulario categoria -->
                <form id="diretorForm" method="POST" action="">
                    @csrf
                    <input type="hidden" name="id" id="diretor_id">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control bg-dark text-white" id="nome_diretor" name="nome"
                            placeholder="Digite o nome do diretor">
                        <label for="floatingInput">Diretor</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" id="modal-submit-button">Salvar</button>
                    </div>
                </form>
                <!--Formulario usuário -->
                <form id="userForm" style="display:none;" class="pl-4 pr-4" method="post" action="">
                    @csrf
                    <input type="hidden" name="id" id="user_id">
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="name" name="nome" class="form-control bg-dark text-white" required>
                        </div>

                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control bg-dark text-white" required>
                        </div>

                        <div class="form-group">
                            <label for="dateInput" class="form-label">Data de nascimento:</label>
                            <input type="date" name="dt_nascimento" class="form-control bg-dark text-white"
                                id="dateInput">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" id="modal-submit-button">Salvar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() { 
            // Quando clicar no botão de lápis para editar
            $('.edit-btn').on('click', function() {
                // Pega o ID da categoria da linha clicada
                var Id = $(this).data('id');
                var name = $(this).data('name');

                $('#exampleModal form').hide();
                $('#'+name+'Form').show();
                // Faz uma requisição para buscar os dados da categoria
                $.ajax({
                    url: '/' + name +'/upd/' + Id,
                    type: 'GET',
                    success: function(response) {
                        // Preenche o modal com os dados da categoria
                        $('#'+name+'_id').val(response.id);
                        $('#nome_'+name+'').val(response.name);
                        $.each(response, function(i, v){
                            $('form[id='+name+'Form] [name='+i+']').val(v);
                        });
                        
                        // Altera o título e o botão do modal
                        $('#exampleModalLabel').text('Alterar '+name);
                        $('#modal-submit-button').text('Alterar');

                        // Altera a ação do formulário para a rota de alteração
                        $('#'+name+'Form').attr('action', '/'+name+'/upd');
                        
                        // Abre o modal
                        $('#exampleModal').modal('show');
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });

            // Quando abrir o modal para inclusão
            $('#add-btn').on('click', function() {
                var name = $(this).data('name');
                // Limpa os campos do modal
                $('#'+name+'_id').val('');
                $('#nome_'+name).val('');
                
                // Restaura o título e o botão do modal
                $('#exampleModalLabel').text('Incluir '+name);
                $('#modal-submit-button').text('Salvar');
                
                // Altera a ação do formulário para a rota de inclusão
                $('#'+name+'Form').attr('action', '/'+name);
                
                // Abre o modal
                $('#exampleModal').modal('show');
            });
        });    
</script>
@endsection