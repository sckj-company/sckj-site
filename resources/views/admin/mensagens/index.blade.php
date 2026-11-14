@extends('admin.layouts.app')

@section('title', 'Mensagens')

@section('content')
    <h1 class="h3 mb-3">Mensagens</h1>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a class="nav-link {{ $estado ? '' : 'active' }}" href="{{ route('admin.mensagens.index') }}">Todas</a>
        </li>
        @foreach (\App\Models\ContactMessage::ESTADOS as $e)
            <li class="nav-item">
                <a class="nav-link {{ $estado === $e ? 'active' : '' }}"
                   href="{{ route('admin.mensagens.index', ['estado' => $e]) }}">{{ ucfirst($e) }}</a>
            </li>
        @endforeach
    </ul>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Serviço</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($mensagens as $m)
                    <tr class="{{ $m->status === 'nova' ? 'fw-semibold' : '' }}">
                        <td>{{ $m->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ $m->nome }}</td>
                        <td>{{ $m->servicoNome() }}</td>
                        <td>
                            <span class="badge bg-{{ ['nova' => 'danger', 'lida' => 'secondary', 'respondida' => 'success'][$m->status] ?? 'secondary' }}">
                                {{ ucfirst($m->status) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.mensagens.show', $m) }}" class="btn btn-sm btn-outline-primary">Abrir</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted py-4">Sem mensagens.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">{{ $mensagens->links() }}</div>
@endsection