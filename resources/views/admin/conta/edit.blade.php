@extends('admin.layouts.app')

@section('title', __('admin.conta_titulo'))

@section('content')
    <h1 class="h3 mb-1">{{ __('admin.conta_titulo') }}</h1>
    <p class="text-muted">{{ auth()->user()->name }} · {{ auth()->user()->email }}</p>

    <form action="{{ route('admin.conta.update') }}" method="POST" style="max-width: 520px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">{{ __('admin.conta_senha_atual') }}</label>
            <input type="password" name="password_atual" autocomplete="current-password"
                   class="form-control @error('password_atual') is-invalid @enderror">
            @error('password_atual')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('admin.conta_senha_nova') }}</label>
            <input type="password" name="password" autocomplete="new-password"
                   class="form-control @error('password') is-invalid @enderror">
            <div class="form-text">{{ __('admin.conta_senha_regra') }}</div>
            @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('admin.conta_senha_repetir') }}</label>
            <input type="password" name="password_confirmation" autocomplete="new-password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('admin.conta_alterar_senha') }}</button>
    </form>
@endsection
