@extends('layouts.app')

@section('content')
<h1>Edit Contact</h1>

<form action="{{ route('contact.update', $contact->id) }}" method="post">
    @csrf
    @method('PUT')

    <label for="">Name</label>
    <input type="text" name="nome" value="{{ old('nome', $contact->nome) }}">

    <label for="">Phone</label>
    <input type="text" name="telefone" value="{{ old('telefone', $contact->telefone) }}">

    <label for="">Mail</label>
    <input type="text" name="email" value="{{ old('email', $contact->email) }}">

    <label for="">Photo</label>
    <input type="file" name="foto" accept="image/*">
    @if($contato->foto)
    <img src="{{ asset('storage/' . $contato->foto) }}" alt="Foto" width="100">
    @endif

    <button type="submit" class="btn btn-success">Update</button>

</form>
@endsection
