@extends('template.default')

@section('title', 'Petflix')


@section('content')
<span class="small-text">
    Veja títulos sobre:
    <span class="text-light">
        @foreach($categorias as $category)
        <a href="?search={{ $category->name }}" class="text-light">{{ $category->name }}</a> &nbsp;
        @endforeach
    </span>
</span>
<br><br>

@if(empty($videos_search))
<h3 class="sub-title">Vídeos em destaque</h3>
<div class="row mb-5 d-flex">
    @foreach($featureds as $item)
    <div class="m-1 bg-white video-image">
        <a id="verificaPlano" href="/visualizacao/{{$item->id}}" class="">
            <img src="{{ $item->image }}" class="img-responsive" title="{{ $item->titulo }}" alt="">
        </a>
    </div>
    @endforeach
</div>

<br /><br /><br />
<h3 class="sub-title">Outros Vídeos</h3>
<div class="row align-self-center mb-5 d-flex">
    @foreach($videos as $item)
    <div class="m-1 bg-white video-image">
        <a id="verificaPlano" href="/visualizacao/{{$item->id}}" class="">
            <img src="{{ $item->video->image }}" class="img-responsive" title="{{ $item->titulo }}" alt="">
        </a>
    </div>
    @endforeach
</div>
@endif



@if(!empty($videos_search))
<h3 class="sub-title">
    @if($search) Vídeos pesquisados por: '{{ $search }}' @endif
    @if(!empty($featured)) Todos os vídeos em destaques @endif
</h3>

<div class="row align-self-center mb-5 d-flex">
    @foreach($videos_search as $item)
    <div class="m-1 bg-white video-image">
        <a id="verificaPlano" href="/visualizacao/{{$item->id}}" class="">
            <img src="{{ $item->image }}" class="img-responsive" title="{{ $item->titulo }}" alt="">
        </a>
    </div>
    @endforeach
    @if($videos_search->isEmpty())
    <i class="ml-3 mt-3">A pesquisa não retornou nenhum vídeo.</i>
    @endif
</div>

@endif

<script>
    $(document).ready(function() {
        const temPlano = @json($temPlano);

        $('#verificaPlano').on('click', function(e) {
            if (temPlano) {
                e.preventDefault();
                $('#planModal').modal('show');
            }
        });
    });
</script>

@endsection