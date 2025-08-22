@extends('layouts.app')

@section('content')
<h1>Register Form</h1>

<form action="{{ route('contact.store') }}" method="post" enctype="multipart/form-data">
    {!! csrf_field() !!}

    <label for="">Name</label>
    <input type="text" name="nome">
    <label for="">Phone</label>
    <input type="text" name="telefone">
    <label for="">Mail</label>
    <input type="text" name="email">
    <label for="">Foto</label>
    <input type="file" name="foto" accept="image/*">
    <button>Register</button>
</form>
@endsection
