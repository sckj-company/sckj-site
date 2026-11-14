@extends('admin.layouts.app')

@section('title', 'Editar serviço')

@section('content')
    <a href="{{ route('admin.servicos.index') }}" class="btn btn-sm btn-outline-secondary mb-3">← Voltar</a>
    <h1 class="h3 mb-3">Editar serviço</h1>

    @if ($servico->status === 'rejeitado')
        <div class="alert alert-danger">
            <strong>Rejeitado pelo Administrador.</strong><br>
            Motivo: {{ $servico->motivo_rejeicao }}
            @unless (auth()->user()->isAdmin())
                <br><small>Ao guardar, o serviço volta a ficar pendente para nova aprovação.</small>
            @endunless
        </div>
    @elseif ($servico->status === 'pendente')
        <div class="alert alert-warning">Este serviço aguarda a aprovação do Administrador.</div>
    @else
        <div class="alert alert-info">Este serviço está publicado: as alterações aparecem logo no site.</div>
    @endif

    <form action="{{ route('admin.servicos.update', $servico) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.servicos._form')
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection