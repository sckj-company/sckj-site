@extends('admin.layouts.app')

@section('title', 'Serviços')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Serviços</h1>
        <a href="{{ route('admin.servicos.create') }}" class="btn btn-primary">Novo serviço</a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Ordem</th>
                        <th>Serviço</th>
                        <th>Estado</th>
                        <th>Criado por</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($servicos as $s)
                    <tr>
                        <td>{{ $s->ordem }}</td>
                        <td>{{ $s->titulo_pt }}</td>
                        <td>
                            @if ($s->status === 'publicado')
                                <span class="badge bg-success">Publicado</span>
                            @elseif ($s->status === 'pendente')
                                <span class="badge bg-warning text-dark">Pendente</span>
                            @else
                                <span class="badge bg-danger">Rejeitado</span>
                            @endif
                        </td>
                        <td>{{ $s->criador?->name ?? '—' }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.servicos.edit', $s) }}" class="btn btn-sm btn-outline-primary">Editar</a>

                            @if (auth()->user()->isAdmin())
                                <form action="{{ route('admin.servicos.destroy', $s) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Eliminar este serviço?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Ainda não há serviços.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection