<!doctype html>
<html lang="pt-BR" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>
    <meta name="description" content="@yield('meta_description', config('app.name').' - Aplicação Laravel')">

    {{-- Bootstrap 5 CSS (CDN) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- Ícone opcional --}}
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    {{-- Espaço para estilos extras --}}
    @stack('styles')

    <style>
        /* Ajustes finos do layout */
        body { min-height: 100vh; display: flex; flex-direction: column; }
        main { flex: 1 0 auto; }
        .nav-link.active { font-weight: 600; }
        .dropdown-menu-end[data-bs-popper] { right: 0; left: auto; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-braces-asterisk" viewBox="0 0 16 16" aria-hidden="true"><path d="M2.5 3a.5.5 0 0 0-.5.5v2.153c0 .163-.083.311-.223.405L1.118 6.53a.5.5 0 0 0 0 .84l.659.472c.14.095.223.242.223.405V10.5a.5.5 0 0 0 .5.5h.75a.5.5 0 0 0 0-1H3V8.652c0-.58-.289-1.126-.774-1.457l-.299-.213.299-.213C2.711 6.438 3 5.891 3 5.312V4h.25a.5.5 0 0 0 0-1zM13.5 3a.5.5 0 0 1 .5.5v2.153c0 .163.083.311.223.405l.659.472a.5.5 0 0 1 0 .84l-.659.472a.5.5 0 0 0-.223.405V10.5a.5.5 0 0 1-.5.5h-.75a.5.5 0 0 1 0-1h.25V8.652c0-.58.289-1.126.774-1.457l.299-.213-.299-.213A1.75 1.75 0 0 1 12.75 4V3h-.25a.5.5 0 0 1 0-1z"/><path d="M7.53 1.87a.5.5 0 0 1 .94 0l.217.65a.5.5 0 0 0 .316.316l.65.217a.5.5 0 0 1 0 .94l-.65.217a.5.5 0 0 0-.316.316l-.217.65a.5.5 0 0 1-.94 0l-.217-.65a.5.5 0 0 0-.316-.316l-.65-.217a.5.5 0 0 1 0-.94l.65-.217a.5.5 0 0 0 .316-.316z"/></svg>
            {{ config('app.name') }}
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Alternar navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link " href="">Início</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->is('admin*') ? 'active' : '' }}"
                        href="#" id="dropdownMenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">Contato</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('contato.index') }}">Listar</a></li>
                        <li><a class="dropdown-item" href="{{ route('contato.create') }}">Cadastrar</a></li>
                    </ul>
                </li>
            </ul>

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

<footer class="bg-body-tertiary border-top py-3 mt-auto">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
        <div class="text-muted small">&copy; {{ date('Y') }} {{ config('app.name') }}. Todos os direitos reservados.</div>
        <div class="small">
            <a class="link-secondary me-3" href="#">Privacidade</a>
            <a class="link-secondary" href="#">Termos</a>
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
