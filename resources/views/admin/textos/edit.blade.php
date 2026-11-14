@extends('admin.layouts.app')

@section('title', 'Editar textos')

@section('content')
    <a href="{{ route('admin.textos.index') }}" class="btn btn-sm btn-outline-secondary mb-3">← Voltar</a>
    <h1 class="h3 mb-3">{{ \App\Models\SiteBlock::PAGINAS[$pagina] ?? ucfirst($pagina) }}</h1>

    <form action="{{ route('admin.textos.update', $pagina) }}" method="POST">
        @csrf
        @method('PUT')

        @foreach ($blocos as $bloco)
            <div class="card mb-3">
                <div class="card-body">
                    <h2 class="h6 mb-0">{{ $bloco->rotulo }}</h2>
                    <p class="small text-muted">{{ $bloco->chave }}</p>

                   @php($idiomas = $bloco->tipo === 'fixo'
                    ? ['pt' => 'Valor (igual em todos os idiomas)']
                    : ['pt' => 'Português', 'en' => 'English', 'zh' => '中文'])

                @foreach ($idiomas as $codigo => $nome)
                        @php($campo = 'blocos.' . $bloco->id . '.' . $codigo)
                        <div class="mb-2">
                            <label class="form-label small mb-1">{{ $nome }}</label>

                            @if ($bloco->tipo === 'texto_longo')
                                <textarea name="blocos[{{ $bloco->id }}][{{ $codigo }}]" rows="3"
                                          class="form-control @error($campo) is-invalid @enderror">{{ old($campo, $bloco->{'valor_' . $codigo}) }}</textarea>
                            @else
                                <input type="text" name="blocos[{{ $bloco->id }}][{{ $codigo }}]"
                                       class="form-control @error($campo) is-invalid @enderror"
                                       value="{{ old($campo, $bloco->{'valor_' . $codigo}) }}">
                            @endif

                            @error($campo)
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

         A SCKJ é uma empresa especializada em prestação de serviços e comércio geral: legalização e criação de empresas, tratamento documental, criação de sistemas empresariais e fornecimento corporativo

        <button type="submit" class="btn btn-primary">Guardar textos</button>
    </form>
@endsection