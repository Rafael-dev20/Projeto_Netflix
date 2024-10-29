<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Category;
use App\Models\Video;
use App\Models\obraAudioVisual;

class LoginController extends Controller
{
    
    public function verifyAuth(){

        //dd(Auth::user());

        if(Auth::check()){
            return redirect()->route('browser');
        }else{
            return view('auth.login');
        }
    }

    public function browser(){
        
        $search = null;
        $featured = null;
        $recently = null;
        $featureds = [];
        $videos = [];
        $videos_search = [];

        !empty($_GET['search']) ? $search = $_GET['search'] : null;
        !empty($_GET['featured']) ? $featured = $_GET['featured'] : null;
        !empty($_GET['recently']) ? $recently = $_GET['recently'] : null;
        
        $categorias = Category::all();

        if(!empty($search)){
            $category = Category::where('name', $search)->first();
            $videos_search = ObraAudioVisual::where('idCategoria', $category->id ?? 0)->orWhereHas('video', function($query) use ($search) {$query->where('title', 'like', '%'.$search.'%');})->get();
        }else if(!empty($featured)){
            $videos_search = Video::where('featured', 1)->get();
        }else if(!empty($recently)){
            $videos_search = obraAudioVisual::orderBy('ano_lancamento', 'desc')->take(10)->get();
        }else{
            $featureds = Video::where('featured', 1)->get();
            $videos = obraAudioVisual::all();
        }
        $user = Auth::user();
        $temPlano = !$user || !$user->plano;

        return view('index', compact('categorias', 'featureds', 'videos', 'search', 'featured', 'videos_search','temPlano'));
    }

    public function admin(){
        $videos = Video::all();
        $categories = Category::all();
        return view('admin', compact('videos','categories') );
    }

}
