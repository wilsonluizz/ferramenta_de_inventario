@extends('layouts.app')


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
                        <form action="{{ route('centros-de-custo.update', $centro_de_custo->id) }}" id="editar"
                            method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-4 my-2">
                                    <input type="text" maxlength="50" name="nome" class="form-control"
                                        value="{{ $centro_de_custo->nome }}"" required>
                                </div>
                                <div class="col-md-4 my-2">
                                    <select name="select_resp" class="form-select" id="select_resp"
                                        aria-label="Floating label select example">
                                        @foreach ($responsaveis as $resp)
                                            <option value="{{ $resp->id }}"  {{ $resp->id == $centro_de_custo->responsavel_id ? 'selected' : '' }} >{{ $resp->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4 my-2">
                                    <input minlength="3" maxlength="3" type="text   " name="codigo" class="form-control"
                                        value="{{ $centro_de_custo->codigo }}" required>
                                </div>
                            </div>

                        </form>

                        <button form="editar" type="submit" class="btn btn-success mt-3" title="Salvar"><i class="bi bi-check"></i></button>
                        <a class="btn btn-info mt-3" href="{{ route('centros-de-custo.index') }}"><i class="bi bi-reply-fill" title="Voltar"></i></a> 
                        <button type="button" class="btn btn-danger delete-btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash" title="Apagar"></i></button>

                        <!-- Modal -->
                        <form action="{{ route('centros-de-custo.destroy', $centro_de_custo->id) }} " id="apagar"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Você está prestes a excluir este centro de custo</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Tem certeza que deseja apagar este centro de custo?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-bs-dismiss="modal"><i class="bi bi-reply-fill"></i></button>
                                        <button type="submit" form="apagar" type="button" class="btn btn-danger delete-btn"><i class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
