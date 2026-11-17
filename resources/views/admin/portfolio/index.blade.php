@extends('admin.layouts.app')

@section('title', __('admin.pf_gestao'))

@section('content')

<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold">{{ __('admin.nav_portfolio') }}</h2>
            <p class="text-muted mb-0">
                {{ __('admin.pf_gerir') }}
            </p>
        </div>

        <a href="{{ route('admin.portfolio.create') }}"
           class="btn btn-primary">
            + {{ __('admin.pf_novo') }}
        </a>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>{{ __('admin.imagem') }}</th>
                        <th>{{ __('admin.projeto') }}</th>
                        <th>{{ __('admin.categoria') }}</th>
                        <th>{{ __('admin.estado') }}</th>
                        <th>{{ __('admin.destaque') }}</th>
                        <th class="text-end">{{ __('admin.acoes') }}</th>
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
                                    <span class="text-muted">{{ __('admin.sem_imagem') }}</span>
                                @endif
                            </td>

                            <td>
                                <strong>{{ $portfolio->title }}</strong>
                            </td>

                            <td>{{ $portfolio->category }}</td>

                            <td>
                                <span class="badge bg-{{ $portfolio->status ? 'success' : 'secondary' }}">
                                    {{ $portfolio->status ? __('admin.status_publicado') : __('admin.status_rascunho') }}
                                </span>
                            </td>

                            <td>
                                {{ $portfolio->featured ? __('admin.sim') : __('admin.nao') }}
                            </td>

                            <td class="text-end">

                                <a href="{{ route('admin.portfolio.edit', $portfolio) }}"
                                   class="btn btn-sm btn-outline-primary">
                                    {{ __('admin.editar') }}
                                </a>

                                @if(auth()->user()->isAdmin())
                                    <form
                                        action="{{ route('admin.portfolio.destroy', $portfolio) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('{{ __('admin.pf_confirmar_eliminar') }}')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-outline-danger">
                                            {{ __('admin.eliminar') }}
                                        </button>
                                    </form>
                                @endif

                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-4">
                                {{ __('admin.pf_sem') }}
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
