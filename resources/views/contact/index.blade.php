@extends('layouts.app')

@section('content')
<h1>Contact List</h1>


<table class="table">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Name</th>
            <th>Phone</th>
            <th>E-mail</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact )

            <tr>
                <td>
                    <img src="{{ asset('storage/products/' . $contact->photo) }}" alt="Foto do contato">

                </td>
                <td>@if($c->photo)
                            <img src="{{ asset('storage/' . $c->photo) }}"
                                alt="Foto de {{ $c->nome }}"
                                width="80" height="80"
                                style="object-fit:cover; border-radius:50%;">
                        @else
                            <span>Sem foto</span>
                </td>
                <td>{{ $contact->nome }}</td>
                <td>{{ $contact->telefone }}</td>
                <td>{{ $contact->email }}</td>
                <td>
                    <form action="{{ route('contact.destroy', $contact->id) }}" method="POST">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a class="btn btn-warning" href="{{ route('contact.edit', $contact->id) }}">Edit</a>
                        <a class="btn btn-secondary" href="{{ route('contact.show', $contact->id) }}">Show</a>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                </form>
                </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
