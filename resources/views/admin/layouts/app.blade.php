<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', __('admin.painel')) - SCKJ</title>

    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/fontawesome.css') }}">
    <link rel="shortcut icon" href="{{asset('assets/img/logo/fav-logo1.png')}}" type="image/x-icon">
    <style>
        .admin-menu .nav-link { color: #212529; border-radius: .5rem; }
        .admin-menu .nav-link:hover { background: #e9ecef; }
        .admin-menu .nav-link.active { background: #0d6efd; color: #fff; }
        .admin-menu .nav-link.disabled { color: #adb5bd; }
        .admin-brand-logo { width: 122px; height: 50px; object-fit: contain; }
    </style>
    @stack('styles')
</head>
<body class="bg-light">

<nav class="navbar bg-white border-bottom px-3">
    <div class="d-flex align-items-center gap-2">
        <button class="btn btn-outline-secondary d-md-none" type="button"
                data-bs-toggle="collapse" data-bs-target="#menuLateral">{{ __('admin.menu') }}</button>
        <a class="navbar-brand mb-0 d-flex align-items-center gap-2" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('assets/img/logo/logo6.png') }}" alt="SCKJ" class="admin-brand-logo">
            <span>{{ __('admin.gestao_site') }}</span>
        </a>
    </div>

    <div class="d-flex align-items-center gap-2 flex-wrap justify-content-end">
        <span class="small text-muted d-none d-sm-inline">
            <i class="fa-solid fa-user-check fa-fw me-1" aria-hidden="true"></i>{{ auth()->user()->name }}
        </span>

        <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="adminIdioma"
                    data-bs-toggle="dropdown" aria-expanded="false" aria-label="{{ __('admin.idioma') }}"
                    title="{{ __('admin.idioma') }}">
                <span class="small text-muted d-none d-lg-inline">{{ __('admin.idioma') }}:</span>
                <img src="{{ bandeira_url(app()->getLocale()) }}" alt="" width="20" height="14" class="me-1">
                {{ config('idiomas')[app()->getLocale()] ?? strtoupper(app()->getLocale()) }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminIdioma">
                @foreach (config('idiomas') as $codigo => $nome)
                    <li>
                        <a class="dropdown-item {{ app()->getLocale() === $codigo ? 'active' : '' }}"
                           href="{{ route('idioma', $codigo) }}" lang="{{ $codigo }}">
                            <img src="{{ bandeira_url($codigo) }}" alt="" width="20" height="14" class="me-2">
                            {{ $nome }} ({{ strtoupper($codigo) }})
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <a href="{{ route('admin.conta.edit') }}" class="btn btn-sm btn-outline-secondary">
            <i class="fa-solid fa-user-gear me-1" aria-hidden="true"></i>{{ __('admin.conta_minha') }}
        </a>
        <a href="{{ route('home') }}" class="btn btn-sm btn-outline-primary" target="_blank">
            <i class="fa-solid fa-arrow-up-right-from-square me-1" aria-hidden="true"></i>{{ __('admin.ver_site') }}
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger">
                <i class="fa-solid fa-right-from-bracket me-1" aria-hidden="true"></i>{{ __('admin.sair') }}
            </button>
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
