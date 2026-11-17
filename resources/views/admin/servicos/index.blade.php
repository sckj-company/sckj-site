@extends('admin.layouts.app')

@section('title', __('admin.nav_servicos'))

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">{{ __('admin.nav_servicos') }}</h1>
        <a href="{{ route('admin.servicos.create') }}" class="btn btn-primary">{{ __('admin.srv_novo') }}</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>{{ __('admin.ordem') }}</th>
                        <th>{{ __('admin.servico') }}</th>
                        <th>{{ __('admin.estado') }}</th>
                        <th>{{ __('admin.criado_por') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($servicos as $s)
                    <tr>
                        <td>{{ $s->ordem }}</td>
                        <td>{{ $s->titulo_pt }}</td>
                        <td>
                            <span class="badge bg-{{ ['publicado' => 'success', 'pendente' => 'warning text-dark', 'rejeitado' => 'danger'][$s->status] ?? 'secondary' }}">
                                {{ __('admin.status_' . $s->status) }}
                            </span>
                        </td>
                        <td>{{ $s->criador?->name ?? '—' }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.servicos.edit', $s) }}" class="btn btn-sm btn-outline-primary">{{ __('admin.editar') }}</a>

                            @if (auth()->user()->isAdmin())
                                <form action="{{ route('admin.servicos.destroy', $s) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('{{ __('admin.srv_confirmar_eliminar') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('admin.eliminar') }}</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">{{ __('admin.srv_sem') }}</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
