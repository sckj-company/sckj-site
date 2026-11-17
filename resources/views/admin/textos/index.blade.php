@extends('admin.layouts.app')

@section('title', __('admin.nav_textos'))

@section('content')
    <h1 class="h3 mb-3">{{ __('admin.txt_titulo') }}</h1>

    <div class="row g-3">
        @forelse ($paginas as $p)
            <div class="col-md-6 col-xl-4">
                <a href="{{ route('admin.textos.edit', $p->pagina) }}" class="text-decoration-none text-reset">
                    <div class="card h-100"><div class="card-body">
                        <h2 class="h6">{{ array_key_exists($p->pagina, \App\Models\SiteBlock::PAGINAS) ? __('admin.site_pagina_' . $p->pagina) : ucfirst($p->pagina) }}</h2>
                        <p class="small text-muted mb-0">{{ $p->total }} {{ __('admin.txt_total') }}</p>
                    </div></div>
                </a>
            </div>
        @empty
            <p class="text-muted">{{ __('admin.txt_sem') }}</p>
        @endforelse
    </div>
@endsection
