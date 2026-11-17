@extends('admin.layouts.app')

@section('title', __('admin.nav_utilizadores'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">{{ __('admin.nav_utilizadores') }}</h1>
        <a href="{{ route('admin.utilizadores.create') }}" class="btn btn-primary">{{ __('admin.usr_novo') }}</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr><th>{{ __('admin.nome') }}</th><th>{{ __('admin.email') }}</th><th>{{ __('admin.papel') }}</th><th>{{ __('admin.estado') }}</th><th></th></tr>
                </thead>
                <tbody>
                @foreach ($utilizadores as $u)
                    <tr>
                        <td>
                            {{ $u->name }}
                            @if ($u->is(auth()->user()))<small class="text-muted">{{ __('admin.usr_voce') }}</small>@endif
                        </td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->isAdmin() ? __('admin.administrador') : __('admin.funcionario') }}</td>
                        <td>
                            <span class="badge bg-{{ $u->ativo ? 'success' : 'secondary' }}">
                                {{ $u->ativo ? __('admin.status_ativo') : __('admin.status_desativado') }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.utilizadores.edit', $u) }}" class="btn btn-sm btn-outline-primary">{{ __('admin.editar') }}</a>

                            @unless ($u->is(auth()->user()))
                                <form action="{{ route('admin.utilizadores.alternar', $u) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('{{ __('admin.usr_alterar_estado') }}');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-{{ $u->ativo ? 'danger' : 'success' }}">
                                        {{ $u->ativo ? __('admin.usr_desativar') : __('admin.usr_ativar') }}
                                    </button>
                                </form>
                            @endunless
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
