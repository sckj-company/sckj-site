@extends('admin.layouts.app')

@section('title', __('admin.srv_novo'))

@section('content')
    <a href="{{ route('admin.servicos.index') }}" class="btn btn-sm btn-outline-secondary mb-3">{{ __('admin.voltar') }}</a>
    <h1 class="h3 mb-1">{{ __('admin.srv_novo') }}</h1>
    <p class="text-muted">
        @if (auth()->user()->isAdmin())
            {{ __('admin.srv_admin_publica') }}
        @else
            {{ __('admin.srv_funcionario_pendente') }}
        @endif
    </p>

    <form action="{{ route('admin.servicos.store') }}" method="POST">
        @csrf
        @include('admin.servicos._form')
        <button type="submit" class="btn btn-primary">
            {{ auth()->user()->isAdmin() ? __('admin.srv_publicar') : __('admin.srv_enviar_aprovacao') }}
        </button>
    </form>
@endsection
