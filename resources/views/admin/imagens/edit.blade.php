@extends('admin.layouts.app')

@section('title', __('admin.img_editar'))

@section('content')
    <a href="{{ route('admin.imagens.index') }}" class="btn btn-sm btn-outline-secondary mb-3">{{ __('admin.voltar') }}</a>
    <h1 class="h3 mb-1">{{ $imagem->rotulo }}</h1>
    @if ($imagem->largura_rec)
        <p class="text-muted">{{ __('admin.img_tamanho_recomendado') }} {{ $imagem->largura_rec }}×{{ $imagem->altura_rec }} px</p>
    @endif

    <div class="row g-4">
        <div class="col-lg-5">
            <img src="{{ \App\Models\SiteImage::url($imagem->chave, $imagem->padrao) }}" alt=""
                 class="img-fluid rounded border">
        </div>

        <div class="col-lg-7">
            <form action="{{ route('admin.imagens.update', $imagem) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">{{ __('admin.img_nova') }}</label>
                    <input type="file" name="ficheiro" accept=".jpg,.jpeg,.png,.webp"
                           class="form-control @error('ficheiro') is-invalid @enderror">
                    @error('ficheiro')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                @foreach (config('idiomas') as $codigo => $nome)
                    <div class="mb-2">
                        <label class="form-label small mb-1">{{ __('admin.img_descricao') }} ({{ $nome }})</label>
                        <input type="text" name="alt_{{ $codigo }}"
                               class="form-control @error('alt_' . $codigo) is-invalid @enderror"
                               value="{{ old('alt_' . $codigo, $imagem->{'alt_' . $codigo}) }}">
                        @error('alt_' . $codigo)
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                @endforeach

                <button type="submit" class="btn btn-primary mt-2">{{ __('admin.guardar') }}</button>
            </form>

            @if ($imagem->caminho)
                <form action="{{ route('admin.imagens.repor', $imagem) }}" method="POST" class="mt-3"
                      onsubmit="return confirm('{{ __('admin.img_confirmar_eliminar') }}');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">{{ __('admin.img_eliminar') }}</button>
                </form>
            @endif
        </div>
    </div>
@endsection
