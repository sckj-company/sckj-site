@extends('admin.layouts.app')

@section('title', __('admin.pf_aprovacoes'))

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ __('admin.pf_aprovacoes_projetos') }}</h2>

        <a href="{{ route('admin.portfolio.index') }}" class="btn btn-secondary">
            {{ __('admin.pf_voltar_portfolio') }}
        </a>
    </div>

    @if($portfolios->isEmpty())
        <div class="alert alert-info">
            {{ __('admin.pf_sem_pendentes') }}
        </div>
    @else

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead>
                    <tr>
                        <th>{{ __('admin.projeto') }}</th>
                        <th>{{ __('admin.categoria') }}</th>
                        <th>{{ __('admin.pf_data_envio') }}</th>
                        <th>{{ __('admin.acoes') }}</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($portfolios as $portfolio)
                    <tr>
                        <td>{{ $portfolio->title }}</td>
                        <td>{{ $portfolio->category }}</td>
                        <td>{{ $portfolio->created_at->format('d/m/Y') }}</td>

                        <td>
                            <a href="{{ route('admin.portfolio.edit', $portfolio) }}"
                               class="btn btn-sm btn-primary">
                                {{ __('admin.editar') }}
                            </a>

                            <form action="{{ route('admin.portfolio.aprovar', $portfolio) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')

                                <button class="btn btn-sm btn-success">
                                    {{ __('admin.pf_aprovar') }}
                                </button>
                            </form>

                            <form action="{{ route('admin.portfolio.rejeitar', $portfolio) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')

                                <input type="text"
                                       name="motivo_rejeicao"
                                       placeholder="{{ __('admin.motivo_rejeicao') }}"
                                       required>

                                <button class="btn btn-sm btn-danger">
                                    {{ __('admin.srv_rejeitar') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $portfolios->links() }}

    @endif
</div>
@endsection
