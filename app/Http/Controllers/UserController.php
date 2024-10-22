<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function IncluirUsuario(Request $request) 
    {
        //$_POST['cat_nome']
        $nome = $request->input("nome");

        $nova = new User;
        $nova->name = $nome;
        $nova->save();

        return redirect('/admin');

        //INSERT INTO categoria (id, cat_nome, cat_descricao)
        // VALUES ( ???, 'VALOR', 'DESCRICAO')
    }

    public function ExcluirUsuario($id)
    {
        //SELECT * Category categoria WHERE id = ID        
        $cat = User::where("id", $id)->first();
        $cat->delete();

        return redirect('/admin');
        //UPDATE categoria SE cat_Ativo = 0 WHERE id=id

    }

    public function BuscarAlteracao($id) 
    {
        $users = User::where("id", $id)->first();

        return response()->json($users);
    }

    public function ExecutaAlteracao(Request $request)
    {
        $dado_id = $request->input("id");
        $dado_nome = $request->input("nome");
        $dado_email = $request->input("email");
        $dado_dt_nascimento = $request->input("dt_nascimento");
        

        $usuario = User::where("id", $dado_id)->first();
        $usuario->nome = $dado_nome;
        $usuario->email = $dado_email;
        $usuario->dt_nascimento = $dado_dt_nascimento;
        $usuario->save();

        return redirect('/admin');
    }
}
