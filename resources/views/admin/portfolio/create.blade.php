@extends('admin.layouts.app')

@section('title', __('admin.pf_novo'))

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">{{ __('admin.pf_novo') }}</h2>
            <p class="text-muted">{{ __('admin.pf_adicionar') }}</p>
        </div>

        <a href="{{ route('admin.portfolio.index') }}"
           class="btn btn-outline-secondary">
            {{ __('admin.voltar') }}
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
                        <label class="form-label">{{ __('admin.pf_nome_projeto') }} *</label>
                        <input type="text" name="title"
                               class="form-control"
                               value="{{ old('title') }}" required>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="categoria_projecto_id" class="form-label">{{ __('admin.categoria') }} *</label>
                        <select id="categoria_projecto_id" name="categoria_projecto_id"
                                class="form-select @error('categoria_projecto_id') is-invalid @enderror" required>
                            <option value="" disabled @selected(old('categoria_projecto_id') === null)>{{ __('admin.cat_selecione') }}</option>
                            @foreach ($categorias as $id => $nome)
                                <option value="{{ $id }}" @selected(old('categoria_projecto_id') == $id)>{{ $nome }}</option>
                            @endforeach
                        </select>
                        @error('categoria_projecto_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        @if (auth()->user()->isAdmin())
                            <small class="text-muted d-block mt-1">
                                <a href="{{ route('admin.categorias.create') }}">{{ __('admin.nav_criar_categoria') }}</a>
                            </small>
                        @endif
                    </div>

                    <div class="col-12">
                        <label class="form-label">{{ __('admin.srv_descricao') }} *</label>
                        <textarea name="description"
                                  class="form-control"
                                  rows="4" required>{{ old('description') }}</textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('admin.pf_tecnologias') }}</label>
                        <input type="text" name="technologies"
                               class="form-control"
                               placeholder="Laravel, JavaScript, C#, PHP, Java, Python, React, Vue, Angular, Node.js"
                               value="{{ old('technologies') }}">
                        <small class="text-muted">
                            {{ __('admin.pf_tec_help') }}
                        </small>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('admin.pf_link_demo') }}</label>
                        <input type="url" name="demo_url"
                               class="form-control"
                               placeholder="https://demo.exemplo.com"
                               value="{{ old('demo_url')}}">
                        @error('demo_url')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">{{ __('admin.pf_imagem_projeto') }}</label>
                        <input type="file" name="image"
                               class="form-control"
                               accept="image/jpeg,image/png,image/webp">
                        <small class="text-muted">
                            {{ __('admin.pf_imagem_help') }}
                        </small>
                        @error('image')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">{{ __('admin.estado') }} *</label>
                        <select name="status" class="form-select" required>
                            <option value="0" @selected(old('status', '0') == '0')>
                                {{ __('admin.status_rascunho') }}
                            </option>
                            <option value="1" @selected(old('status') == '1')>
                                {{ __('admin.status_publicado') }}
                            </option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label d-block">{{ __('admin.destaque') }}</label>
                        <div class="form-check mt-2">
                            <input type="checkbox"
                                   name="featured"
                                   value="1"
                                   class="form-check-input"
                                   @checked(old('featured'))>
                            <label class="form-check-label" for="featured">
                                {{ __('admin.pf_destacar') }}
                            </label>
                        </div>
                    </div>

                </div>

                <hr class="my-4">

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('admin.pf_guardar') }}
                    </button>

                    <a href="{{ route('admin.portfolio.index') }}"
                       class="btn btn-light">
                        {{ __('admin.cancelar') }}
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection
