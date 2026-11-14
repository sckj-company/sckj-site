@extends('admin.layouts.app')

@section('title', 'Imagens')

@section('content')
    <h1 class="h3 mb-3">Imagens do site</h1>

    <div class="row g-3">
        @forelse ($imagens as $img)
            <div class="col-md-6 col-xl-4">
                <div class="card h-100">
                    <img src="{{ \App\Models\SiteImage::url($img->chave, $img->padrao) }}" alt=""
                         class="card-img-top" style="height: 180px; object-fit: cover;">
                    <div class="card-body">
                        <h2 class="h6 mb-1">{{ $img->rotulo }}</h2>
                        <p class="small text-muted mb-2">
                            {{ \App\Models\SiteBlock::PAGINAS[$img->pagina] ?? ucfirst($img->pagina) }}
                            @if ($img->largura_rec)
                                · recomendado {{ $img->largura_rec }}×{{ $img->altura_rec }} px
                            @endif
                            @if ($img->caminho)
                                · <span class="badge bg-info text-dark">Personalizada</span>
                            @endif
                        </p>
                        <a href="{{ route('admin.imagens.edit', $img) }}" class="btn btn-sm btn-outline-primary">Alterar</a>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-muted">Ainda não há imagens registadas. Corre o SiteImageSeeder.</p>
        @endforelse
    </div>
@endsection