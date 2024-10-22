@extends('template.default')

@section('title', 'Petflix')

@section('content')
<div class="container mt-4">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Detalhes da Obra</h2>
        <a href="{{ url('/') }}" class="btn btn-secondary">Voltar</a>
    </div>

    <!-- Seção de Detalhes -->
    <div class="row">
        <!-- Capa -->
        <div class="col-md-4">
            <img src="{{ asset('images/' . $obras->capa) }}" alt="Capa da obra" class="img-fluid rounded shadow-sm">
        </div>

        <!-- Informações -->
        <div class="col-md-8">
            <h1>{{ $obras->titulo }}</h1>
            <p><strong>Descrição:</strong> {{ $obras->descricao }}</p>
            <p><strong>Ano de Lançamento:</strong> {{ $obras->ano_lancamento }}</p>
            <p><strong>Diretor:</strong> {{ $obras->diretor->nome }}</p>
            <p><strong>Categoria:</strong> {{ $obras->categoria->name }}</p>
        </div>
    </div>

    <!-- Lista de Episódios (visível apenas se for uma série) -->
    @if($obras->tipo == 'Serie')
    <div class="mt-5">
        <h3>Episódios</h3>
        <div class="list-group">
            @foreach($obras->episodios as $episodio)
            <a href="{{-- route('episodios.show', $episodio->id) --}}" class="list-group-item list-group-item-action">
                <div class="d-flex justify-content-between align-items-center">
                    <h5>Temporada {{ $episodio->temporada }} - {{ $episodio->titulo }}</h5>
                    <small>{{ $episodio->duracao }} min</small>
                </div>
                <p class="mb-0">{{ $episodio->descricao }}</p>
            </a>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection