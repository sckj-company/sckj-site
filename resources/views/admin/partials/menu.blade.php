@php($novas = \App\Models\ContactMessage::where('status', 'nova')->count())
@php($pendentes = auth()->user()->isAdmin() ? \App\Models\Service::where('status', 'pendente')->count() : 0)

<ul class="nav nav-pills flex-column gap-1">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
           href="{{ route('admin.dashboard') }}">Início</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.mensagens.*') ? 'active' : '' }}"
           href="{{ route('admin.mensagens.index') }}">
            Mensagens
            @if ($novas > 0)
                <span class="badge ms-1" style="background:#dc3545; color:#fff;">{{ $novas }}</span>
            @endif
        </a>
    </li>

    {{-- Conteúdo: Administrador e Funcionário --}}
    <li class="nav-item mt-3 px-3">
        <small class="text-uppercase text-muted">Conteúdo das Páginas</small>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.textos.*') ? 'active' : '' }}"
           href="{{ route('admin.textos.index') }}">Textos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.servicos.*') ? 'active' : '' }}"
           href="{{ route('admin.servicos.index') }}">Serviços</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.imagens.*') ? 'active' : '' }}"
           href="{{ route('admin.imagens.index') }}">Imagens</a>
    </li>

    {{-- Administração: só o Administrador --}}
    @if (auth()->user()->isAdmin())
        <li class="nav-item mt-3 px-3">
            <small class="text-uppercase text-muted">Administração</small>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.aprovacoes.*') ? 'active' : '' }}"
               href="{{ route('admin.aprovacoes.index') }}">
                Aprovações
                @if ($pendentes > 0)
                    <span class="badge ms-1" style="background:#dc3545; color:#fff;">{{ $pendentes }}</span>
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.utilizadores.*') ? 'active' : '' }}"
               href="{{ route('admin.utilizadores.index') }}">Utilizadores</a>
        </li>
    @endif
</ul>