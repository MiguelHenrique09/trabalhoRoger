@extends('layout.app')

@section('content')

<div class="container mt-5">
    <h1 class="fw-bolder mb-1">
        Blog do Roger
    </h1>
    <h5 class="fw-bolder mb-1">
        Bem-vindo ao meu blog!
    </h5>
    <br>
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#modalNovaPostagem">
    Criar Postagem
</button>

<hr>


    <div class="row">

        <div class="col-lg-8">

            @foreach($postagens as $postagem)

        <article>

            <header class="mb-4">

                <h2 class="fw-bolder mb-1">
                    {{ $postagem->titulo }}
                </h2>

                <div class="text-muted fst-italic mb-2">
                    Postado em
                    {{ $postagem->created_at->format('d/m/Y') }}
                    por
                    {{ $postagem->autor }}
                </div>

                <a class="badge bg-secondary text-decoration-none link-light">
                    {{ $postagem->categoria->nome }}
                </a>

            </header>

            <section class="mb-3">

                <p class="fs-5 mb-4">
                    {{ $postagem->texto }}
                </p>

            </section>

        </article>

        <hr>
@if($postagem->comentarios->count() > 0)
    <div class="mb-3">
        <h6 class="fw-bold">Comentários:</h6>
        @foreach($postagem->comentarios as $comentario)
            <div class="border rounded p-2 mb-2 bg-light">
                <strong>{{ $comentario->autor }}</strong>
                <small class="text-muted"> — {{ $comentario->created_at->format('d/m/Y') }}</small>
                <p class="mb-0 mt-1">{{ $comentario->texto }}</p>
            </div>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('criaComentario') }}" class="mb-4">
    @csrf
    <input type="hidden" name="postagem_id" value="{{ $postagem->id }}">
    <div class="mb-2">
        <input type="text" class="form-control form-control-sm" name="autor" placeholder="Seu nome" required>
    </div>
    <div class="mb-2">
        <textarea class="form-control form-control-sm" name="texto" rows="2" placeholder="Escreva um comentário..." required></textarea>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Comentar</button>
</form>

<hr>

    @endforeach

        </div>


        <div class="col-lg-4">

            <div class="card mb-4">

                <div class="card-header">
                    Search
                </div>

                <div class="card-body">

                    <div class="input-group">

                        <input class="form-control"
                               type="text"
                               placeholder="Enter search term..."
                               aria-label="Enter search term...">

                        <button class="btn btn-primary"
                                id="button-search"
                                type="button">

                            Go!

                        </button>

                    </div>

                </div>

            </div>


            <div class="card mb-4">

   Categorias 
                  
               
                <div class="card-body">

                    <div class="row">

                        <div class="col-sm-6">

    <ul class="list-unstyled mb-0">

        @foreach($categorias as $categoria)

            <li>
                {{ $categoria->nome }}
            </li>

        @endforeach

    </ul>

                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
<div class="modal fade" id="modalNovaPostagem" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header table-dark text-white">
                <h5 class="modal-title">Nova Postagem</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('criaPost') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Título</label>
                        <input type="text" class="form-control" name="titulo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Autor</label>
                        <input type="text" class="form-control" name="autor" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Categoria</label>
                        <select class="form-select" name="categoria_id">
                            <option value="">Sem categoria</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Texto</label>
                        <textarea class="form-control" name="texto" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection