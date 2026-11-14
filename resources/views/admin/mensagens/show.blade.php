@extends('admin.layouts.app')

@section('title', 'Mensagem')

@section('content')
    <a href="{{ route('admin.mensagens.index') }}" class="btn btn-sm btn-outline-secondary mb-3">← Voltar</a>

    <div class="card">
        <div class="card-body">
            <h1 class="h5">{{ $mensagem->servicoNome() }}</h1>
            <p class="text-muted small">Recebida a {{ $mensagem->created_at->format('d/m/Y H:i') }}</p>

            <dl class="row mb-4">
                <dt class="col-sm-3">Nome</dt>
                <dd class="col-sm-9">{{ $mensagem->nome }}</dd>
                <dt class="col-sm-3">Email</dt>
                <dd class="col-sm-9">{{ $mensagem->email }}</dd>
                <dt class="col-sm-3">Telefone / WhatsApp</dt>
                <dd class="col-sm-9">{{ $mensagem->telefone }}</dd>
                <dt class="col-sm-3">Mensagem</dt>
                <dd class="col-sm-9" style="white-space: pre-line;">{{ $mensagem->mensagem }}</dd>
            </dl>

            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary"
                   href="mailto:{{ $mensagem->email }}?subject={{ rawurlencode('Re: ' . $mensagem->servicoNome()) }}">
                    Responder por email
                </a>

                @if ($mensagem->status !== 'respondida')
                    <form action="{{ route('admin.mensagens.respondida', $mensagem) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-success">Marcar como respondida</button>
                    </form>
                @endif

                @if (auth()->user()->isAdmin())
                    <form action="{{ route('admin.mensagens.destroy', $mensagem) }}" method="POST"
                          onsubmit="return confirm('Eliminar esta mensagem?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                    </form>
                @endif
            </div>

            @if ($mensagem->status === 'respondida')
                <p class="small text-muted mt-3 mb-0">
                    Respondida por {{ $mensagem->respondidaPor?->name ?? 'utilizador removido' }}
                    a {{ $mensagem->answered_at?->format('d/m/Y H:i') }}.
                </p>
            @endif
        </div>
    </div>
@endsection