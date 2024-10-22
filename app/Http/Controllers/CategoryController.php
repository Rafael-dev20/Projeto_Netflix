<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() 
    {   
        $categories = Category::all();
        return view('template.default', compact('category') );
    }

    public function IncluirCategoria(Request $request) 
    {
        $nome = $request->input("nome");

        $nova = new Category;
        $nova->name = $nome;
        $nova->save();

        return redirect('/admin');
    }

    public function ExcluirCategoria($id)
    {
        $cat = Category::where("id", $id)->first();
        $cat->delete();

        return redirect('/admin');

    }

    public function BuscarAlteracao($id) 
    {
        $categories = Category::where("id", $id)->first();

        return response()->json($categories);
    }

    public function ExecutaAlteracao(Request $request)
    {
        $dado_nome = $request->input("nome");
        $dado_id = $request->input('id');

        $categoria = Category::where("id", $dado_id)->first();
        $categoria->name = $dado_nome;
        $categoria->save();

        return redirect('/admin');
    }
}
