@extends('layouts.app')

@section('content')
<h1>Lista de contatos</h1>

<table class="table">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contatos as $contato )

        <tr>
            <td>{{ $contato->nome }}</td>
            <td>{{ $contato->telefone }}</td>
            <td>{{ $contato->email }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
