<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', __('admin.painel')) - SCKJ</title>

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
    <style>
        .admin-menu .nav-link { color: #212529; border-radius: .5rem; }
        .admin-menu .nav-link:hover { background: #e9ecef; }
        .admin-menu .nav-link.active { background: #0d6efd; color: #fff; }
        .admin-menu .nav-link.disabled { color: #adb5bd; }
    </style>
    @stack('styles')
</head>
<body class="bg-light">

@php($bandeiras = ['pt' => '🇦🇴', 'en' => '🇬🇧', 'zh' => '🇨🇳'])

<nav class="navbar bg-white border-bottom px-3">
    <div class="d-flex align-items-center gap-2">
        <button class="btn btn-outline-secondary d-md-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#menuLateral">{{ __('admin.menu') }}</button>
        <a class="navbar-brand mb-0" href="{{ route('admin.dashboard') }}">SCKJ · {{ __('admin.gestao') }}</a>
    </div>

    <div class="d-flex align-items-center gap-2 flex-wrap justify-content-end">
        <span class="small text-muted d-none d-sm-inline">
            {{ auth()->user()->name }}
            <span class="badge bg-secondary">{{ auth()->user()->isAdmin() ? __('admin.administrador') : __('admin.funcionario') }}</span>
        </span>

        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="adminIdioma"
                    data-bs-toggle="dropdown" aria-expanded="false" aria-label="{{ __('admin.idioma') }}"
                    title="{{ __('admin.idioma') }}">
                <span class="small text-muted d-none d-lg-inline">{{ __('admin.idioma') }}:</span>
                {{ $bandeiras[app()->getLocale()] ?? '' }} {{ config('idiomas')[app()->getLocale()] ?? strtoupper(app()->getLocale()) }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminIdioma">
                @foreach (config('idiomas') as $codigo => $nome)
                    <li>
                        <a class="dropdown-item {{ app()->getLocale() === $codigo ? 'active' : '' }}"
                           href="{{ route('idioma', $codigo) }}" lang="{{ $codigo }}">
                            {{ $bandeiras[$codigo] ?? '' }} {{ $nome }} ({{ strtoupper($codigo) }})
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <a href="{{ route('admin.conta.edit') }}" class="btn btn-sm btn-outline-secondary">{{ __('admin.conta_minha') }}</a>
        <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary" target="_blank">{{ __('admin.ver_site') }}</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('admin.sair') }}</button>
        </form>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <aside id="menuLateral" class="col-md-3 col-lg-2 bg-white border-end collapse d-md-block p-3 admin-menu"
               style="min-height: calc(100vh - 57px);">
            @include('admin.partials.menu')
        </aside>

        <main class="col-md-9 col-lg-10 p-4">
            @if (session('sucesso') || session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('sucesso') ?? session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('erro'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('erro') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>
@stack('scripts')
</body>
</html>
