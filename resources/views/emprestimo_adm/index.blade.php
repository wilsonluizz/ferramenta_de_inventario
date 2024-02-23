@extends('layouts.app')

@section('content')
    <div class="row row-cols-1 pb-3">
        <div class="col">
            <div class="card">

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-9">
                            <h3 class="pt-1"><i class="bi bi-hourglass"></i> Aguardando aprovação</h3>
                        </div>

                    </div>
                </div>

                <div class="card-body table-aguardando_aprovacao">
                    <table class="table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th class="col-3">Equipamento</th>
                                <th class="col-3">Solicitante</th>
                                <th class="col-2">Matricula</th>
                                <th class="col-2">Solicitado em</th>
                                <th class="col-2 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitacoes as $solicitacao)
                                @if ($solicitacao->status_id === 3)
                                    <tr>
                                        <td>{{ $solicitacao->equipamentosGenericos->titulo }}</td>
                                        <td>{{ $solicitacao->usuario->name }}</td>
                                        <td>{{ $solicitacao->usuario->matricula }}</td>

                                        <td>{{ date('d/m/Y', strtotime($solicitacao->created_at)) }}</td>
                                        <td class="text-center">

                                            @can('admin')
                                                <a class="btn btn-sm btn-info"
                                                    href="{{ route('adm-emprestimos.show', $solicitacao->id) }}"
                                                    data-toggle="tooltip" title="Ver detalhes">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link"
                                    href="{{ $solicitacoes->previousPageUrl() }}">Voltar</a></li>
                            @for ($i = 1; $i <= $solicitacoes->lastPage(); $i++)
                                <li class="page-item {{ $solicitacoes->currentPage() == $i ? 'active' : '' }}"><a
                                        class="page-link" href="{{ $solicitacoes->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            <li class="page-item"><a class="page-link" href="{{ $solicitacoes->nextPageUrl() }}">Avançar</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-10 mt-1">
                            <a class="text-muted pt-2 text-decoration-none" href="{{ route('admin') }}">
                                <i class="bi bi-arrow-return-left"></i>
                                <span class="ms-2">Voltar à página anterior</span>
                            </a>
                        </div>

                        <div class="col-2 text-end"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
