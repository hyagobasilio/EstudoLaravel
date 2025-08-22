<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;

class ContatoRafaelController extends Controller
{

    public function create()
    {
        return view('contatoRafael.create');
    }

    public function index()
    {
        $contatos = ContatoRafael::all();

        return view('contatoRafael.index', compact('contatos'));
    }

    public function store(Request $request)
    {

        contatoRafael::create($request->all());
        return redirect()->route('contatorafael.index')->with('status', 'Cadastro realizado com sucesso!');
    }

}
  