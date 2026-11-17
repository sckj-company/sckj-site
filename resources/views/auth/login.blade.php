<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Entrar') }} - SCKJ</title>
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
</head>
<body class="bg-light">
<div class="d-flex align-items-center justify-content-center min-vh-100 py-5">
    <div class="w-100" style="max-width: 420px;">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <img src="{{ asset('assets/img/logo/fav-logo3.png') }}" alt="Logo" class="d-block mx-auto mb-4" style="max-width: 150px;">
                <h1 class="h4 mb-4 text-center">{{ __('Iniciar Sessão') }}</h1>

                <form action="{{ route('login.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input type="email" id="email" name="email"
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Palavra-passe') }}</label>
                        <input type="password" id="password" name="password"
                               class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="lembrar" name="lembrar">
                        <label class="form-check-label" for="lembrar">{{ __('Manter sessão iniciada') }}</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">{{ __('Entrar') }}</button>
                </form>
            </div>
        </div>

        {{-- Seletor de idioma: fica depois do cartão e dentro do container --}}
        <div class="text-center mt-3 small">
            @foreach (config('idiomas') as $codigo => $nome)
                <a href="{{ route('idioma', $codigo) }}"
                   class="mx-2 {{ app()->getLocale() === $codigo ? 'fw-bold' : '' }}">{{ $nome }}</a>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
