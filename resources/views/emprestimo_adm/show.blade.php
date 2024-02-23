@extends('layouts.app');

{{-- @section('content')
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                <li class="list-group-item"><strong>Solicitante: </strong>{{ $solicitacao->usuario->name }}</li>
                <li class="list-group-item"><strong>Matrícula do solicitante:</strong> {{ $solicitacao->usuario->matricula }}
                </li>
                <li class="list-group-item"><strong>Equipamento solicitado:</strong>
                    {{ $solicitacao->equipamentosGenericos->nome }}
                </li>
                <li class="list-group-item">
                    <div class="col-4">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Ações</option>
                            @foreach ($status as $status)
                                @if ($status->validacao === 1)
                                    <option value="{{ $status->id }}">{{ $status->status }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection --}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-pencil"></i> Editar centro de custo</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('adm-emprestimos.update', $solicitacao->id) }}" id="editar"
                            method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-4 my-2">
                                    <label for="basic-url" class="form-label">Usuário solicitante</label>
                                    <input type="text" readonly maxlength="50" name="nome_solicitante" class="form-control"
                                        value="{{ $solicitacao->usuario->name }}"" required>
                                </div>
                                <div class="col-4 my-2">
                                    <label for="basic-url" class="form-label">Matrícula do solicitante</label>
                                    <input type="text" readonly maxlength="50" name="matricula_solicitante" class="form-control"
                                        value="{{ $solicitacao->usuario->matricula }}"" required>
                                </div>
                                <div class="col-4 my-2">
                                    <label for="basic-url" class="form-label">Material solicitado</label>
                                    <input type="text" readonly maxlength="50" name="equipamento_generico" class="form-control"
                                        value="{{ $solicitacao->equipamentosGenericos->nome }}"" required>
                                </div>
                                <div class="col-md-4 my-2">
                                    <select name="select_status" class="form-select" id="select_status"
                                        aria-label="Floating label select example">
                                        <option selected disabled value="">Selecione a ação</option>
                                        @foreach ($status as $status)
                                            @if ($status->validacao === 1)
                                                <option value="{{ $status->id }}">{{ $status->status }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </form>

                        <button form="editar" type="submit" class="btn btn-success mt-3" title="Salvar"><i
                                class="bi bi-check"></i></button>
                        <a class="btn btn-info mt-3" href="{{ route('adm-emprestimos.index') }}"><i class="bi bi-reply-fill"
                                title="Voltar"></i></a>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
