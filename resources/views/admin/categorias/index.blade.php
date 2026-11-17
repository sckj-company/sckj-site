@extends('admin.layouts.app')

@section('title', __('admin.cat_titulo'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">{{ __('admin.cat_titulo') }}</h1>
            <p class="text-muted mb-0">{{ __('admin.cat_descricao') }}</p>
        </div>

        <a href="{{ route('admin.categorias.create') }}" class="btn btn-primary">
            {{ __('admin.cat_nova') }}
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">
            @forelse ($categorias as $categoria)
                <div class="d-flex align-items-center justify-content-between border-bottom px-3 py-2">
                    <span class="fw-semibold">{{ $categoria->nome }}</span>

                    <div class="d-flex gap-2">
                        <a href="{{ route('admin.categorias.edit', $categoria) }}"
                           class="btn btn-sm btn-outline-primary">
                            {{ __('admin.editar') }}
                        </a>

                        <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST"
                              onsubmit="return confirm('{{ __('admin.cat_confirmar_eliminar') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                {{ __('admin.eliminar') }}
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-muted p-3 mb-0">{{ __('admin.cat_sem') }}</p>
            @endforelse
        </div>
    </div>
@endsection
