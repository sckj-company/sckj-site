@extends('admin.layouts.app')

@section('title', __('admin.nav_inicio'))

@section('content')
    @php
        $admin = auth()->user()->isAdmin();

        $cartoes = [
            [__('admin.dash_cartao_mensagens'), __('admin.dash_cartao_mensagens_desc'),
                route('admin.mensagens.index'),
                \App\Models\ContactMessage::where('status', 'nova')->count(), __('admin.dash_novas')],
            [__('admin.dash_cartao_textos'), __('admin.dash_cartao_textos_desc'),
                route('admin.textos.index'), 0, ''],
            [__('admin.dash_cartao_servicos'), __('admin.dash_cartao_servicos_desc'),
                route('admin.servicos.index'), 0, ''],
            [__('admin.dash_cartao_imagens'), __('admin.dash_cartao_imagens_desc'),
                route('admin.imagens.index'), 0, ''],
        ];

        if ($admin) {
            $cartoes[] = [__('admin.dash_cartao_aprovacoes'), __('admin.dash_cartao_aprovacoes_desc'),
                route('admin.aprovacoes.index'),
                \App\Models\Service::where('status', 'pendente')->count(), __('admin.dash_pendentes')];
            $cartoes[] = [__('admin.dash_cartao_utilizadores'), __('admin.dash_cartao_utilizadores_desc'),
                route('admin.utilizadores.index'), 0, ''];
        }
    @endphp

    <h1 class="h3 mb-1">{{ __('admin.dash_ola') }}, {{ auth()->user()->name }}</h1>
    <p class="text-muted mb-4">
        {{ $admin ? __('admin.dash_admin') : __('admin.dash_funcionario') }}
    </p>

    <div class="row g-3">
        @foreach ($cartoes as [$titulo, $descricao, $link, $total, $legenda])
            <div class="col-md-6 col-xl-4">
                <a href="{{ $link }}" class="text-decoration-none text-reset">
                    <div class="card h-100">
                        <div class="card-body">
                            <h2 class="h6 d-flex justify-content-between align-items-center">
                                {{ $titulo }}
                                @if ($total > 0)
                                    <span class="badge" style="background:#dc3545; color:#fff;">{{ $total }} {{ $legenda }}</span>
                                @endif
                            </h2>
                            <p class="small text-muted mb-0">{{ $descricao }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
