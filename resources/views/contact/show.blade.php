@extends('layouts.app')

@section('content')
<h1>Contact Details</h1>

<p><strong>Name:</strong> {{ $contact->nome }}</p>
<p><strong>Phone:</strong> {{ $contact->telefone }}</p>
<p><strong>Email:</strong> {{ $contact->email }}</p>

<form action="{{ route('contact.destroy', $contact->id) }}" method="POST" class="delete-form" style="display:inline;" nsubmit="return confirm('Tem certeza que deseja deletar este registro?');">
    @csrf
    @method('DELETE')
    <a class="btn btn-secondary" href="{{ route('contact.index') }}">Back to list</a> |
    <a class="btn btn-warning" href="{{ route('contact.edit', $contact->id) }}">Edit</a>
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    @if($contact->foto)
    <img src="{{ asset('storage/' . $contact->foto) }}" alt="photo" width="150">
@endif

</form>
@endsection
