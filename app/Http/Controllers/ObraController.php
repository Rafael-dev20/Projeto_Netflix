<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObraAudioVisual;

class ObraController extends Controller
{
    public function IncluirObra(Request $request) 
    {
        $nome = $request->input("nome");

        $nova = new ObraAudioVisual;
        $nova->nome = $nome;
        $nova->save();

        return redirect('/admin');
    }

    public function ExcluirObra($id)
    {
        $cat = ObraAudioVisual::where("id", $id)->first();
        $cat->delete();

        return redirect('/admin');

    }

    public function BuscarAlteracao($id) 
    {
        $categories = ObraAudioVisual::where("id", $id)->first();

        return response()->json($categories);
    }

    public function ExecutaAlteracao(Request $request)
    {
        $obras = ObraAudioVisual::where('id', $request->input('id'))->first();
        $obras->fill($request->all());
        $obras->save();

        return redirect('/admin');
    }
}
