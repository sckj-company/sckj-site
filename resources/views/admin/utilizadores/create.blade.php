@extends('admin.layouts.app')

@section('title', 'Novo utilizador')

@section('content')
    <a href="{{ route('admin.utilizadores.index') }}" class="btn btn-sm btn-outline-secondary mb-3">← Voltar</a>
    <h1 class="h3 mb-3">Novo utilizador</h1>

    <form action="{{ route('admin.utilizadores.store') }}" method="POST" style="max-width: 520px;">
        @csrf
        @include('admin.utilizadores._form')
        <button type="submit" class="btn btn-primary">Criar utilizador</button>
    </form>
@endsection