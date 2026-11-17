@php($novas = \App\Models\ContactMessage::where('status', 'nova')->count())
@php($pendentes = auth()->user()->isAdmin() ? \App\Models\Service::where('status', 'pendente')->count() : 0)
@php($portfolioPendentes = auth()->user()->isAdmin()
    ? \App\Models\Portfolio::where('approval_status', 'pendente')->count()
    : 0)

<ul class="nav nav-pills flex-column gap-1">
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
           href="{{ route('admin.dashboard') }}">{{ __('admin.nav_inicio') }}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.mensagens.*') ? 'active' : '' }}"
           href="{{ route('admin.mensagens.index') }}">
            {{ __('admin.nav_mensagens') }}
            @if ($novas > 0)
                <span class="badge ms-1" style="background:#dc3545; color:#fff;">{{ $novas }}</span>
            @endif
        </a>
    </li>

    {{-- Conteúdo: Administrador e Funcionário --}}
    <li class="nav-item mt-3 px-3">
        <small class="text-uppercase text-muted">{{ __('admin.nav_conteudo') }}</small>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.textos.*') ? 'active' : '' }}"
           href="{{ route('admin.textos.index') }}">{{ __('admin.nav_textos') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.servicos.*') ? 'active' : '' }}"
           href="{{ route('admin.servicos.index') }}">{{ __('admin.nav_servicos') }}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.imagens.*') ? 'active' : '' }}"
           href="{{ route('admin.imagens.index') }}">{{ __('admin.nav_imagens') }}</a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('admin.portfolio.*') ? 'active' : '' }}"
           href="{{ route('admin.portfolio.index') }}">
            {{ __('admin.nav_portfolio') }}
        </a>
    </li>

    {{-- Administração: só o Administrador --}}
    @if (auth()->user()->isAdmin())
        <li class="nav-item mt-3 px-3">
            <small class="text-uppercase text-muted">{{ __('admin.nav_administracao') }}</small>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.aprovacoes.*') ? 'active' : '' }}"
               href="{{ route('admin.aprovacoes.index') }}">
                {{ __('admin.nav_aprovacoes_servicos') }}
                @if ($pendentes > 0)
                    <span class="badge ms-1" style="background:#dc3545; color:#fff;">{{ $pendentes }}</span>
                @endif
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.portfolio.aprovacoes') ? 'active' : '' }}"
               href="{{ route('admin.portfolio.aprovacoes') }}">
                {{ __('admin.nav_aprovacoes_pendentes') }}

                @if ($portfolioPendentes > 0)
                    <span class="badge ms-1"
                        style="background:#dc3545; color:#fff;">
                        {{ $portfolioPendentes }}
                    </span>
                @endif
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.categorias.*') ? 'active' : '' }}"
               href="{{ route('admin.categorias.create') }}">{{ __('admin.nav_criar_categoria') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.utilizadores.*') ? 'active' : '' }}"
               href="{{ route('admin.utilizadores.index') }}">{{ __('admin.nav_utilizadores') }}</a>
        </li>
    @endif
</ul>
