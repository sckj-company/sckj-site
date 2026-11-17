@extends('admin.layouts.app')

@section('title', __('admin.nav_imagens'))

@section('content')
    <h1 class="h3 mb-3">{{ __('admin.img_titulo') }}</h1>

    <div class="row g-3">
        @forelse ($imagens as $img)
            <div class="col-md-6 col-xl-4">
                <div class="card h-100">
                    <img src="{{ \App\Models\SiteImage::url($img->chave, $img->padrao) }}" alt=""
                         class="card-img-top" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="h6 mb-1">{{ $img->rotulo }}</h2>
                        <p class="small text-muted mb-2">
                            {{ array_key_exists($img->pagina, \App\Models\SiteBlock::PAGINAS) ? __('admin.site_pagina_' . $img->pagina) : ucfirst($img->pagina) }}
                            @if ($img->largura_rec)
                                · {{ __('admin.img_recomendado') }} {{ $img->largura_rec }}×{{ $img->altura_rec }} px
                            @endif
                            @if ($img->caminho)
                                · <span class="badge bg-info text-dark">{{ __('admin.img_personalizada') }}</span>
                            @endif
                        </p>
                        <a href="{{ route('admin.imagens.edit', $img) }}" class="btn btn-sm btn-outline-primary">{{ __('admin.img_alterar') }}</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">{{ __('admin.img_sem') }}</p>
        @endforelse
    </div>
@endsection
