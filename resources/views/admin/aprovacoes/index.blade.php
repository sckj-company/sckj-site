@extends('admin.layouts.app')

@section('title', 'Aprovações')

@section('content')
    <h1 class="h3 mb-3">Aprovações pendentes</h1>

    @forelse ($pendentes as $s)
        <div class="card mb-3">
            <div class="card-body">
                <p class="small text-muted mb-2">
                    Enviado por {{ $s->criador?->name ?? 'utilizador removido' }}
                    a {{ $s->created_at->format('d/m/Y H:i') }}
                </p>

                @foreach (['pt' => 'Português', 'en' => 'English', 'zh' => '中文'] as $codigo => $nome)
                    @php($titulo = $s->{'titulo_' . $codigo})
                    @if (filled($titulo))
                        <p class="mb-2">
                            <span class="badge bg-secondary">{{ $nome }}</span>
                            <strong>{{ $titulo }}</strong><br>
                            <span style="white-space: pre-line;">{{ $s->{'descricao_' . $codigo} }}</span>
                        </p>
                    @endif
                @endforeach

                <div class="d-flex flex-wrap gap-2 mt-3">
                    <form action="{{ route('admin.servicos.aprovar', $s) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">Aprovar e publicar</button>
                    </form>

                    <a href="{{ route('admin.servicos.edit', $s) }}" class="btn btn-outline-primary">Rever / editar</a>

                    <form action="{{ route('admin.servicos.rejeitar', $s) }}" method="POST" class="d-flex gap-2 flex-grow-1">
                        @csrf
                        @method('PATCH')
                        <input type="text" name="motivo_rejeicao" class="form-control"
                               placeholder="Motivo da rejeição" maxlength="500" required>
                        <button type="submit" class="btn btn-outline-danger">Rejeitar</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Não há serviços à espera de aprovação.</p>
    @endforelse
@endsection