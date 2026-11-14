@extends('admin.layouts.app')

@section('title', 'Início')

@section('content')
    @php
        $admin = auth()->user()->isAdmin();

        $cartoes = [
            ['Mensagens', 'Pedidos enviados pelo formulário de contactos.',
                route('admin.mensagens.index'),
                \App\Models\ContactMessage::where('status', 'nova')->count(), 'nova(s)'],
            ['Textos', 'Textos das páginas e do rodapé, em três idiomas.',
                route('admin.textos.index'), 0, ''],
            ['Serviços', 'Criar e editar os serviços apresentados no site.',
                route('admin.servicos.index'), 0, ''],
            ['Imagens', 'Trocar as imagens do site.',
                route('admin.imagens.index'), 0, ''],
        ];

        if ($admin) {
            $cartoes[] = ['Aprovações', 'Serviços à espera de publicação.',
                route('admin.aprovacoes.index'),
                \App\Models\Service::where('status', 'pendente')->count(), 'pendente(s)'];
            $cartoes[] = ['Utilizadores', 'Contas de Administradores e Funcionários.',
                route('admin.utilizadores.index'), 0, ''];
        }
    @endphp

    <h1 class="h3 mb-1">Olá, {{ auth()->user()->name }}</h1>
    <p class="text-muted mb-4">
        {{ $admin
            ? 'Como Administrador, geres mensagens, conteúdo, aprovações e utilizadores.'
            : 'Como Funcionário, vês as mensagens e geres o conteúdo do site. Os novos serviços ficam pendentes até o Administrador os aprovar.' }}
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

