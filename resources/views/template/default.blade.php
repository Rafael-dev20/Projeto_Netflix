<!DOCTYPE html>
<html lang="pt">

<head>
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="{{ asset('/assets/js/jquery.yu2fvl.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}">
    <link href="{{ asset('/assets/css/jquery.yu2fvl.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/css/default.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{ route('index') }}"> <img src="{{ asset('/images/petflix.svg') }}" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div style="justify-content: space-between" class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(Route::currentRouteName()!=='admin') {{  empty(request()->input()) ? 'active' : '' }} @endif"
                        href="{{ route('index') }}">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->input('featured')) ? 'active' : '' }} "
                        href="{{ route('browser', ['featured' => 1]) }}">Destaques</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->input('recently')) ? 'active' : '' }} "
                        href="{{ route('browser', ['recently' => 1]) }}">Adicionados recentemente</a>
                </li>
                @if (Auth::user()->fg_admin == 1)
                <li class="nav-item">
                    <a class="nav-link {{ (Route::currentRouteName() === 'admin'? 'active' :'') }}"
                        href="{{ route('admin') }}">Admin</a>
                </li>
                @endif
            </ul>

            <div class="col-md-3">
                <form class="form-inline my-2 my-lg-0 mr-5 input-group" id="frm-search" method="get">
                    <button class="input-group-text bg-black" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                    <input class="form-control mr-sm-2 bg-black" type="search" name="search"
                        placeholder="Pesquisar vídeos...">
                </form>
            </div>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="btn btn-danger btn-sm mt-2 mr-3 ml-1" title="Adicionar Vídeos" data-bs-toggle="modal"
                        data-bs-target="#mdAddVideo">
                        <i class="fa fa-play"></i>
                    </button>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('/images/profile.jpg') }}" class="profile-image" alt="">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <div class="content text-light p-5">
        @yield('content')
    </div>


    <div class="modal fade" id="mdAddVideo" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Vídeo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('video') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="basic-url" class="form-label">Vídeo</label>
                            <div class="input-group">
                                <span class="input-group-text" id="url-span">https://www.youtube.com/watch?v=</span>
                                <input type="text" name="url" class="form-control" id="url"
                                    aria-describedby="basic-addon3 basic-addon4">
                            </div>
                            <div class="form-text" id="basic-addon4">Copie e cole o final da URL do vídeo do Youtube que
                                deseja adicionar.</div>
                        </div>
                        <div class="form-floating">
                            <input type="text" name="title" class="form-control" id="title" placeholder="Título">
                            <label for="title">Título</label>
                        </div>
                        <div class="form-floating">
                            <textarea type="text" name="description" class="form-control" id="description"
                                placeholder="description"></textarea>
                            <label for="description">Descrição</label>
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="category">Categoria</label>
                            <select name="category" class="form-select" id="category">
                                <option>Selecione uma categoria</option>
                                @foreach($categorias as $linha)
                                <option value="{{ $linha->id }}">{{ $linha->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="featured" class="form-check-input">
                            <label class="form-check-label">Vídeo destaque?</label>
                        </div>
                        <button type="submit" class="btn btn-danger" style="float: right;">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Adicionar Vídeo-->
    <div class="modal fade" id="mdAddVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Vídeo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('video') }}">
                        @csrf

                        <div class="form-group">
                            <label>Vídeo</label>
                            <input type="text" name="url" class="form-control"
                                placeholder="https://www.youtube.com/watch?v=????????????" required>
                            <small class="form-text text-muted">Copie e cole a URL do vídeo no Youtube que deseja
                                adicionar.</small>
                        </div>
                        <div class="form-group">
                            <label>Título</label>
                            <input type="text" name="title" class="form-control" placeholder="Título do seu video..."
                                required>
                        </div>
                        <div class="form-group">
                            <label>Descrição</label>
                            <textarea name="description" class="form-control"
                                placeholder="Descrição do seu vídeo..."></textarea>
                        </div>
                        <div class="form-group">
                            <label>Categoria</label>
                            <select name="category" class="form-control" required>
                                <option>Selecione uma categoria</option>
                                @foreach($categorias as $linha)
                                <option value="{{ $linha->id }}">{{ $linha->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="featured" class="form-check-input">
                            <label class="form-check-label">Vídeo destaque?</label>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger float-right">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>