@extends('admin.layouts.app')

@section('title', __('admin.cat_editar'))

@section('content')
    <a href="{{ route('admin.categorias.index') }}" class="btn btn-sm btn-outline-secondary mb-3">
        {{ __('admin.voltar') }}
    </a>

    <h1 class="h3 mb-4">{{ __('admin.cat_editar') }}</h1>

    <div class="card shadow-sm" style="max-width: 520px;">
        <div class="card-body p-4">
            @include('admin.categorias._form', [
                'action' => route('admin.categorias.update', $categoriaProjecto),
                'metodo' => 'PUT',
                'categoriaProjecto' => $categoriaProjecto,
                'botao' => __('admin.cat_guardar'),
            ])
        </div>
    </div>
@endsection
