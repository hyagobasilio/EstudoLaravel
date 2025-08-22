@extends('layouts.app')

@section('content')
<h1>Tela de cadastro</h1>

<form action="{{ route('contatorafael.store') }}" method="post">
    {!! csrf_field() !!}

    <label for="">Nome</label>
    <input type="text" name="nome">
    <label for="">Telefone</label>
    <input type="text" name="telefone">
    <label for="">Email</label>
    <input type="text" name="email">
    <button>Cadastrar</button>
</form>
@endsection
