@extends('admin.layouts.app')

@section('title', __('admin.nav_inicio'))

@push('styles')
    <style>
        .grafico-altura { height: 190px; }
        .grafico-barra {
            background: linear-gradient(180deg, #0d6efd, #6ea8fe);
            border-radius: .35rem .35rem 0 0;
            min-height: 3px;
        }
        .grafico-label { font-size: .7rem; }
    </style>
@endpush

@section('content')
    <h1 class="h3 mb-1">{{ __('admin.dash_ola') }}, {{ auth()->user()->name }}</h1>
    <p class="text-muted mb-4">
        {{ $admin ? __('admin.dash_admin') : __('admin.dash_funcionario') }}
    </p>

    <div class="row g-3">
        @foreach ($cartoes as $cartao)
            <div class="col-md-6 col-xl-4">
                <a href="{{ $cartao['link'] }}" class="text-decoration-none text-reset">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body d-flex align-items-start gap-3">
                            <span class="d-inline-flex align-items-center justify-content-center rounded-3 bg-primary bg-opacity-10 text-primary flex-shrink-0"
                                  style="width: 44px; height: 44px;">
                                <i class="{{ $cartao['icone'] }} fa-lg" aria-hidden="true"></i>
                            </span>
                            <div class="flex-grow-1">
                                <h2 class="h6 d-flex justify-content-between align-items-center mb-1">
                                    <span>{{ $cartao['titulo'] }}</span>
                                    @if ($cartao['total'] > 0)
                                        <span class="badge rounded-pill text-bg-danger">
                                            {{ $cartao['total'] }} {{ $cartao['legenda'] }}
                                        </span>
                                    @endif
                                </h2>
                                <p class="small text-muted mb-0">{{ $cartao['descricao'] }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    @php
        $maximo = max(1, max(array_column($serieMensagens, 'total')));
    @endphp

    <div class="card shadow-sm border-0 mt-4">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-4">
                <div class="d-flex align-items-start gap-3">
                    <span class="d-inline-flex align-items-center justify-content-center rounded-3 bg-primary bg-opacity-10 text-primary flex-shrink-0"
                          style="width: 44px; height: 44px;">
                        <i class="fa-solid fa-chart-line fa-lg" aria-hidden="true"></i>
                    </span>
                    <div>
                        <h2 class="h5 mb-1">{{ __('admin.dash_grafico_titulo') }}</h2>
                        <p class="small text-muted mb-0">{{ __('admin.dash_grafico_subtitulo') }}</p>
                    </div>
                </div>
                <div class="text-md-end">
                    <div class="small text-muted">{{ __('admin.dash_total_interacoes') }}</div>
                    <div class="display-6 fw-bold text-primary">{{ $totalInteracoes }}</div>
                </div>
            </div>

            @if ($totalInteracoes === 0)
                <p class="text-muted text-center py-4 mb-0">{{ __('admin.dash_grafico_vazio') }}</p>
            @else
                <div class="d-flex align-items-end gap-2 grafico-altura" role="img"
                     aria-label="{{ __('admin.dash_grafico_titulo') }}">
                    @foreach ($serieMensagens as $mes)
                        @php($altura = max(3, (int) round($mes['total'] / $maximo * 100)))
                        <div class="flex-fill h-100 d-flex flex-column justify-content-end align-items-center"
                             title="{{ $mes['periodo'] }}: {{ $mes['total'] }}">
                            <span class="small fw-semibold mb-1">{{ $mes['total'] }}</span>
                            <div class="w-100 grafico-barra" style="height: {{ $altura }}%;" aria-hidden="true"></div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex gap-2 mt-2">
                    @foreach ($serieMensagens as $mes)
                        <div class="flex-fill text-center grafico-label text-muted">{{ $mes['label'] }}</div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
