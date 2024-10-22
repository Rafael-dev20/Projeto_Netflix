<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diretor;

class DiretorController extends Controller
{
    public function index() 
    {   
        $diretores = Diretor::all();
        return view('template.default', compact('diretores') );
    }

    public function IncluirDiretor(Request $request) 
    {
        $nome = $request->input("nome");

        $nova = new Diretor;
        $nova->nome = $nome;
        $nova->save();

        return redirect('/admin');
    }

    public function ExcluirDiretor($id)
    {
        $cat = Diretor::where("id", $id)->first();
        $cat->delete();

        return redirect('/admin');

    }

    public function BuscarAlteracao($id) 
    {
        $categories = Diretor::where("id", $id)->first();

        return response()->json($categories);
    }

    public function ExecutaAlteracao(Request $request)
    {
        $dado_nome = $request->input("nome");
        $dado_id = $request->input('id');

        $categoria = Diretor::where("id", $dado_id)->first();
        $categoria->nome = $dado_nome;
        $categoria->save();

        return redirect('/admin');
    }
}
