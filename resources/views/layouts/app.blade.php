<!doctype html>
<html lang="pt-br" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('meta_description', config('app.name').' - Aplicação Laravel')">

    {{-- Bootstrap 5 CSS (CDN) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Ícone opcional --}}
    <link rel="icon" type="image/png" href="{{ asset('registro.png') }}">

    {{-- Espaço para estilos extras --}}
    @stack('styles')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Arial, sans-serif;
}
body {
    background-color: #3c3c3c;
    color: #2f3640;
    padding: 20px;
}
.container {
    max-width: 900px;
    margin: auto;
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0px 4px 12px rgba(0,0,0,0.1);
}
h1, h2, h3 {
    margin-bottom: 20px;
    color: #273c75;
}
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}
label {
    font-weight: bold;
    color: #353b48;
}
input[type="text"],
input[type="email"],
button {
    padding: 10px;
    border: 1px solid #dcdde1;
    border-radius: 8px;
    font-size: 14px;
}
input[type="text"]:focus,
input[type="email"]:focus {
    border-color: #0097e6;
    outline: none;
}
button {
    background-color: #0097e6;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background .3s;
}
button:hover {
    background-color: #888;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}
table th, table td {
    border: 1px solid #dcdde1;
    padding: 10px;
    text-align: left;
}
table th {
    background-color: #0097e6;
    color: #fff;
}
table tr:nth-child(even) {
    background-color: #f1f2f6;
}
a {
    color: #0097e6;
    text-decoration: none;
    font-weight: bold;
}
a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand">Registration Agency</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Iniciation</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('admin*') ? 'active' : '' }}"
                        href="#" id="dropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contato</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('contato.index') }}">Listar</a></li>
                        <li><a class="dropdown-item" href="{{ route('contato.create') }}">Cadastrar</a></li>
                    </ul>
                </li>
<<<<<<< HEAD
                </li>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('admin*') ? 'active' : '' }}"
                    href="#" id="dropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contact</a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('contact.store') }}">List</a></li>
                    <li><a class="dropdown-item" href="{{ route('contact.create') }}">Register</a></li>
                    </ul>
                </li>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true"></a>
                </li>
=======
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('admin*') ? 'active' : '' }}"
                        href="#" id="dropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contato Rafael</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('contato.index') }}">Listar</a></li>
                        <li><a class="dropdown-item" href="{{ route('contato.create') }}">Cadastrar</a></li>
                    </ul>
                </li>
>>>>>>> 2bddb1954085dd226822a4e8e03e2874ea3a696a
            </ul>
            <form class="d-flex" role="search" action="{{ route('contact.index') }}" method="post">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search"/>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

{{-- Breadcrumb opcional --}}
@if (trim($__env->yieldContent('breadcrumb')))
    <nav aria-label="breadcrumb" class="bg-body-tertiary border-bottom">
        <ol class="breadcrumb container my-2">
            @yield('breadcrumb')
        </ol>
    </nav>
@endif

<main class="py-4">
    <div class="container">
        {{-- Alerts/Flash messages --}}
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <div class="fw-bold mb-2">Ocorreram alguns erros:</div>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Conteúdo da página --}}
        @yield('content')
    </div>
</main>

<footer  style="background-color: #3c3c3c;">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
        <div class="small">
            <a class="link-secondary me-3" href="#">Suport</a>
            <a class="link-secondary" href="#">Terms</a>
        </div>
    </div>
</footer>

{{-- Bootstrap 5 JS (Bundle inclui Popper) --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

{{-- Script: alternância de tema claro/escuro persistente --}}
<script>

</script>

{{-- Espaço para scripts extras --}}
@stack('scripts')

</body>
</html>
