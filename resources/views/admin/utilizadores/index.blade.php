@extends('admin.layouts.app')

@section('title', 'Utilizadores')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Utilizadores</h1>
        <a href="{{ route('admin.utilizadores.create') }}" class="btn btn-primary">Novo utilizador</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr><th>Nome</th><th>Email</th><th>Papel</th><th>Estado</th><th></th></tr>
                </thead>
                <tbody>
                @foreach ($utilizadores as $u)
                    <tr>
                        <td>
                            {{ $u->name }}
                            @if ($u->is(auth()->user()))<small class="text-muted">(você)</small>@endif
                        </td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->isAdmin() ? 'Administrador' : 'Funcionário' }}</td>
                        <td>
                            @if ($u->ativo)
                                <span class="badge bg-success">Ativo</span>
                            @else
                                <span class="badge bg-secondary">Desativado</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.utilizadores.edit', $u) }}" class="btn btn-sm btn-outline-primary">Editar</a>

                            @unless ($u->is(auth()->user()))
                                <form action="{{ route('admin.utilizadores.alternar', $u) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Alterar o estado desta conta?');">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-outline-{{ $u->ativo ? 'danger' : 'success' }}">
                                        {{ $u->ativo ? 'Desativar' : 'Ativar' }}
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