<form action="{{ $action }}" method="POST">
    @csrf
    @if ($metodo)
        @method($metodo)
    @endif

    <div class="mb-3">
        <label for="nome" class="form-label">{{ __('admin.cat_nome') }} *</label>
        <input type="text" id="nome" name="nome"
               class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome', $categoriaProjecto?->nome) }}" required autofocus>
        @error('nome')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">{{ $botao }}</button>
        <a href="{{ route('admin.categorias.index') }}" class="btn btn-light">
            {{ __('admin.cancelar') }}
        </a>
    </div>
</form>
