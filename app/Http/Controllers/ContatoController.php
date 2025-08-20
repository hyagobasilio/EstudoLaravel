<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{

    public function create()
    {
        return view('contato.create');
    }

    public function index()
    {
        $contatos = Contato::all();

        return view('contato.index', compact('contatos'));
    }

    public function store(Request $request)
    {

        Contato::create($request->all());
        return redirect()->route('contato.index')->with('status', 'Cadastro realizado com sucesso!');
    }

}
