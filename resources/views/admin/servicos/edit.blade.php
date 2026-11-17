@extends('admin.layouts.app')

@section('title', __('admin.srv_editar'))

@section('content')
    <a href="{{ route('admin.servicos.index') }}" class="btn btn-sm btn-outline-secondary mb-3">{{ __('admin.voltar') }}</a>
    <h1 class="h3 mb-3">{{ __('admin.srv_editar') }}</h1>

    @if ($servico->status === 'rejeitado')
        <div class="alert alert-danger">
            <strong>{{ __('admin.srv_rejeitado_admin') }}</strong><br>
            {{ __('admin.srv_motivo') }} {{ $servico->motivo_rejeicao }}
            @unless (auth()->user()->isAdmin())
                <br><small>{{ __('admin.srv_reenviar_nota') }}</small>
            @endunless
        </div>
    @elseif ($servico->status === 'pendente')
        <div class="alert alert-warning">{{ __('admin.srv_aguarda') }}</div>
    @else
        <div class="alert alert-info">{{ __('admin.srv_publicado_nota') }}</div>
    @endif

    <form action="{{ route('admin.servicos.update', $servico) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.servicos._form')
        <button type="submit" class="btn btn-primary">{{ __('admin.guardar') }}</button>
    </form>
@endsection
