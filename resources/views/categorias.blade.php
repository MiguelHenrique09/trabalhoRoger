@extends('layout.app')

@section('content')

<div class="container mt-5">
    
    @if(session('sucesso'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('sucesso') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

 <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalNovaCategoria">
    <i class="bi bi-plus-lg"></i> Nova Categoria
</button>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome da Categoria</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nome }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    
                                    <button type="button" 
                                            class="btn btn-sm" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#modalEditarCategoria"
                                            data-id="{{ $categoria->id }}"
                                            data-nome="{{ $categoria->nome }}">
                                        Editar
                                    </button>

                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir a categoria &quot;{{ $categoria->nome }}&quot;?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm " title="Excluir">
                                            Excluir
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center p-3 text-muted">Nenhuma categoria cadastrada.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarCategoria" tabindex="-1" aria-labelledby="modalEditarCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header table-dark text-white">
                <h5 class="modal-title" id="modalEditarCategoriaLabel">Editar Categoria</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form id="formEditarCategoria" method="POST" action="">
                @csrf
                @method('PUT')
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="inputNomeCategoria" class="form-label fw-bold text-muted">Digite o novo nome da categoria</label>
                        <input type="text" class="form-control" id="inputNomeCategoria" name="nome" required>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>
 <div class="modal fade" id="modalNovaCategoria" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header table-dark text-white">
                <h5 class="modal-title">Digite o novo nome da categoria</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('criaCategoria') }}">
                @csrf
                <div class="modal-body">
                    <input type="text" class="form-control" name="nome" id="inputNomeCategoria" placeholder="Nome da categoria" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const modalEditar = document.getElementById('modalEditarCategoria');
    if (modalEditar) {
        modalEditar.addEventListener('show.bs.modal', event => {
            // Botão que disparou o modal
            const botao = event.relatedTarget;
            
            // Extrai as informações dos atributos data-*
            const id = botao.getAttribute('data-id');
            const nome = botao.getAttribute('data-nome');
            
            // Atualiza os campos do modal
            const inputNome = modalEditar.querySelector('#inputNomeCategoria');
            const form = modalEditar.querySelector('#formEditarCategoria');
            
            inputNome.value = nome;
            
            // Define a rota de update dinamicamente substituindo pelo ID correto
            form.action = `/categorias/${id}`;
        });
    }

   
</script>

@endsection