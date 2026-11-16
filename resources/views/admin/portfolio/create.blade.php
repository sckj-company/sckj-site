@extends('admin.layouts.app')

@section('title', 'Novo Projeto - Portfólio')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Novo Projeto</h2>
            <p class="text-muted">Adiciona um projeto ao portfólio da SCKJ.</p>
        </div>

        <a href="{{ route('admin.portfolio.index') }}"
           class="btn btn-outline-secondary">
            Voltar
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <form action="{{ route('admin.portfolio.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Nome do Projeto *</label>
                        <input type="text" name="title"
                               class="form-control"
                               value="{{ old('title') }}" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Categoria *</label>
                        <input type="text" name="category"
                               class="form-control"
                               placeholder="Ex: Sistema de Gestão"
                               value="{{ old('category') }}" required>
                        @error('category')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label">Descrição *</label>
                        <textarea name="description"
                                  class="form-control"
                                  rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Tecnologias</label>
                        <input type="text" name="technologies"
                               class="form-control"
                               placeholder="Laravel, JavaScript, C#, PHP, Java, Python, React, Vue, Angular, Node.js"
                             value="{{ old('technologies') }}">
                        <small class="text-muted">
                            Separa as tecnologias por vírgulas.
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Link da Demonstração</label>
                        <input type="url" name="demo_url"
                               class="form-control"
                               placeholder="https://demo.exemplo.com"
                               value="{{ old('demo_url')}}">
                        @error('demo_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Imagem do Projeto</label>
                        <input type="file" name="image"
                               class="form-control"
                               accept="image/jpeg,image/png,image/webp">
                        <small class="text-muted">
                            JPG, PNG ou WEBP. Máximo 2 MB.
                        </small>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Estado *</label>
                      <select name="status" class="form-select" required>
                        <option value="0" @selected(old('status', '0') == '0')>
                            Rascunho
                        </option>
                        <option value="1" @selected(old('status') == '1')>
                            Publicado
                        </option>
                    </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label d-block">Destaque</label>
                        <div class="form-check mt-2">
                          <input type="checkbox"
                            name="featured"
                            value="1"
                            class="form-check-input"
                            @checked(old('featured'))>
                            <label class="form-check-label" for="featured">
                                Destacar projeto
                            </label>
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Guardar Projeto
                    </button>

                    <a href="{{ route('admin.portfolio.index') }}"
                       class="btn btn-light">
                        Cancelar
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
