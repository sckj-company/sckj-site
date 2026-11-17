@extends('admin.layouts.app')

@section('title', __('admin.usr_novo'))

@section('content')
    <a href="{{ route('admin.utilizadores.index') }}" class="btn btn-sm btn-outline-secondary mb-3">{{ __('admin.voltar') }}</a>
    <h1 class="h3 mb-3">{{ __('admin.usr_novo') }}</h1>

    <form action="{{ route('admin.utilizadores.store') }}" method="POST" style="max-width: 520px;">
        @csrf
        @include('admin.utilizadores._form')
        <button type="submit" class="btn btn-primary">{{ __('admin.usr_criar') }}</button>
    </form>
@endsection
