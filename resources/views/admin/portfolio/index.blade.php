
@extends('admin.layouts.app')

@section('title', 'Gestão de Portfólio')

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">Portfólio</h2>
            <p class="text-muted mb-0">
                Gere os projetos apresentados no site.
            </p>
        </div>

        <a href="{{ route('admin.portfolio.create') }}"
           class="btn btn-primary">
            + Novo Projeto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Projeto</th>
                        <th>Categoria</th>
                        <th>Estado</th>
                        <th>Destaque</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($portfolios as $portfolio)

                        <tr>
                            <td>
                                @if($portfolio->image)
                                    <img
                                        src="{{ asset('storage/'.$portfolio->image) }}"
                                        width="65"
                                        height="45"
                                        class="rounded"
                                        style="object-fit: cover;"
                                    >
                                @else
                                    <span class="text-muted">Sem imagem</span>
                                @endif
                            </td>

                            <td>
                                <strong>{{ $portfolio->title }}</strong>
                            </td>

                            <td>{{ $portfolio->category }}</td>

                            <td>
                                @if($portfolio->status)
                                    <span class="badge bg-success">Publicado</span>
                                @else
                                    <span class="badge bg-secondary">Rascunho</span>
                                @endif
                            </td>

                            <td>
                                {{ $portfolio->featured ? 'Sim' : 'Não' }}
                            </td>

                            <td class="text-end">

                                <a href="{{ route('admin.portfolio.edit', $portfolio) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Editar
                                </a>

                                @if(auth()->user()->isAdmin())
                                    <form
                                        action="{{ route('admin.portfolio.destroy', $portfolio) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Tens a certeza que pretendes eliminar este projeto?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-outline-danger">
                                            Eliminar
                                        </button>
                                    </form>
                                @endif

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-4">
                                Ainda não existem projetos cadastrados.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

            {{ $portfolios->links() }}

        </div>
    </div>

</div>

@endsection
