@php($servico = $servico ?? null)

@foreach (['pt' => 'Português', 'en' => 'English', 'zh' => '中文'] as $codigo => $nome)
    @php($campoTitulo = 'titulo_' . $codigo)
    @php($campoDescricao = 'descricao_' . $codigo)

    <div class="card mb-3">
        <div class="card-body">
            <h2 class="h6">{{ $nome }} @if ($codigo === 'pt')<span class="text-danger">*</span>@endif</h2>

            <div class="mb-2">
                <label class="form-label small mb-1">Título</label>
                <input type="text" name="{{ $campoTitulo }}"
                       class="form-control @error($campoTitulo) is-invalid @enderror"
                       value="{{ old($campoTitulo, $servico?->{$campoTitulo}) }}">
                @error($campoTitulo)
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label class="form-label small mb-1">Descrição</label>
                <textarea name="{{ $campoDescricao }}" rows="3"
                          class="form-control @error($campoDescricao) is-invalid @enderror">{{ old($campoDescricao, $servico?->{$campoDescricao}) }}</textarea>
                @error($campoDescricao)
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
@endforeach

<div class="mb-3" style="max-width: 220px;">
    <label class="form-label small mb-1">Ordem de apresentação</label>
    <input type="number" name="ordem" min="0"
           class="form-control @error('ordem') is-invalid @enderror"
           value="{{ old('ordem', $servico?->ordem ?? 0) }}">
    <div class="form-text">O número mais pequeno aparece primeiro.</div>
    @error('ordem')
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>