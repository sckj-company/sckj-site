@extends('admin.layouts.app')

@section('title', 'Textos')

@section('content')
    <h1 class="h3 mb-3">Textos das páginas</h1>

    <div class="row g-3">
        @forelse ($paginas as $p)
            <div class="col-md-6 col-xl-4">
                <a href="{{ route('admin.textos.edit', $p->pagina) }}" class="text-decoration-none text-reset">
                    <div class="card h-100"><div class="card-body">
                        <h2 class="h6">{{ \App\Models\SiteBlock::PAGINAS[$p->pagina] ?? ucfirst($p->pagina) }}</h2>
                        <p class="small text-muted mb-0">{{ $p->total }} texto(s) editável(eis)</p>
                    </div></div>
                </a>
            </div>
        @empty
            <p class="text-muted">Ainda não há textos registados. Corre o SiteBlockSeeder.</p>
        @endforelse
    </div>
@endsection