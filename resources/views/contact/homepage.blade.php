@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Bem-vindo ao Sistema de Registro</h1>
    <p class="mt-3">Gerencie seus contatos de forma simples e rápida.</p>

    <div class="mt-4">
        <a href="{{ route('contact.index') }}" class="btn btn-primary">Ver Contatos</a>
        <a href="{{ route('contact.create') }}" class="btn btn-success">Novo Contato</a>
    </div>
</div>
@endsection
