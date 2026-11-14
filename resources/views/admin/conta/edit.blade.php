@extends('admin.layouts.app')

@section('title', 'A minha conta')

@section('content')
    <h1 class="h3 mb-1">A minha conta</h1>
    <p class="text-muted">{{ auth()->user()->name }} · {{ auth()->user()->email }}</p>

    <form action="{{ route('admin.conta.update') }}" method="POST" style="max-width: 520px;">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Palavra-passe atual</label>
            <input type="password" name="password_atual" autocomplete="current-password"
                   class="form-control @error('password_atual') is-invalid @enderror">
            @error('password_atual')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nova palavra-passe</label>
            <input type="password" name="password" autocomplete="new-password"
                   class="form-control @error('password') is-invalid @enderror">
            <div class="form-text">Mínimo 10 caracteres, com letras e números.</div>
            @error('password')<div class="text-danger small mt-1">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Repetir a nova palavra-passe</label>
            <input type="password" name="password_confirmation" autocomplete="new-password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Alterar palavra-passe</button>
    </form>
@endsection