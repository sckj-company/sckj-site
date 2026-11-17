@extends('admin.layouts.app')

@section('title', __('admin.msg_mensagem'))

@section('content')
    <a href="{{ route('admin.mensagens.index') }}" class="btn btn-sm btn-outline-secondary mb-3">{{ __('admin.voltar') }}</a>

    <div class="card">
        <div class="card-body">
            <h1 class="h5">{{ $mensagem->servicoNome() }}</h1>
            <p class="text-muted small">{{ __('admin.msg_recebida') }} {{ $mensagem->created_at->format('d/m/Y H:i') }}</p>

            <dl class="row mb-4">
                <dt class="col-sm-3">{{ __('admin.nome') }}</dt>
                <dd class="col-sm-9">{{ $mensagem->nome }}</dd>
                <dt class="col-sm-3">{{ __('admin.email') }}</dt>
                <dd class="col-sm-9">{{ $mensagem->email }}</dd>
                <dt class="col-sm-3">{{ __('admin.msg_telefone') }}</dt>
                <dd class="col-sm-9">{{ $mensagem->telefone }}</dd>
                <dt class="col-sm-3">{{ __('admin.msg_mensagem') }}</dt>
                <dd class="col-sm-9" style="white-space: pre-line;">{{ $mensagem->mensagem }}</dd>
            </dl>

            <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary"
                   href="mailto:{{ $mensagem->email }}?subject={{ rawurlencode('Re: ' . $mensagem->servicoNome()) }}">
                    {{ __('admin.msg_responder_email') }}
                </a>

                @if ($mensagem->status !== 'respondida')
                    <form action="{{ route('admin.mensagens.respondida', $mensagem) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-outline-success">{{ __('admin.msg_marcar_respondida') }}</button>
                    </form>
                @endif

                @if (auth()->user()->isAdmin())
                    <form action="{{ route('admin.mensagens.destroy', $mensagem) }}" method="POST"
                          onsubmit="return confirm('{{ __('admin.msg_confirmar_eliminar') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">{{ __('admin.eliminar') }}</button>
                    </form>
                @endif
            </div>

            @if ($mensagem->status === 'respondida')
                <p class="small text-muted mt-3 mb-0">
                    {{ __('admin.msg_respondida_por') }} {{ $mensagem->respondidaPor?->name ?? __('admin.utilizador_removido') }}
                    {{ __('admin.data') }} {{ $mensagem->answered_at?->format('d/m/Y H:i') }}.
                </p>
            @endif
        </div>
    </div>
@endsection
