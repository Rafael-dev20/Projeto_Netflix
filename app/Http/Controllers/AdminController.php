<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Diretor;
use App\Models\Category;
use App\Models\ObraAudiovisual;
use App\Models\Video;
use App\Models\Episodio;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        $diretores = Diretor::all();
        $categorias = Category::all();
        $obras = ObraAudiovisual::all();
        $videos = Video::all();

        return view('admin', compact('usuarios', 'diretores', 'categorias', 'obras','videos'));
    }

    public function view()
    {
        $usuarios = User::all();
        $diretores = Diretor::all();
        $categorias = Category::all();
        $obras = ObraAudiovisual::where("id", '3')->first();
        $videos = Video::all();
        $episodios = Episodio::all();

        return view('visualizacao', compact('episodios','usuarios', 'diretores', 'categorias', 'obras','videos'));
    }
}
