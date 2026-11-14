@extends('admin.layouts.app')

@section('title', 'Novo serviço')

@section('content')
    <a href="{{ route('admin.servicos.index') }}" class="btn btn-sm btn-outline-secondary mb-3">← Voltar</a>
    <h1 class="h3 mb-1">Novo serviço</h1>
    <p class="text-muted">
        @if (auth()->user()->isAdmin())
            O serviço será publicado de imediato.
        @else
            O serviço fica pendente até o Administrador o aprovar.
        @endif
    </p>

    <form action="{{ route('admin.servicos.store') }}" method="POST">
        @csrf
        @include('admin.servicos._form')
        <button type="submit" class="btn btn-primary">
            {{ auth()->user()->isAdmin() ? 'Publicar' : 'Enviar para aprovação' }}
        </button>
    </form>
@endsection