@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-pencil"></i> Editar Responsável</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('responsaveis.update', $responsavel->id) }}" id="editar"
                            method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-4 my-2">
                                    <input type="text" maxlength="50" name="nome" class="form-control"
                                        value="{{ $responsavel->nome }}"" required>
                                </div>
                                <div class="col-4 my-2">
                                    <input type="text"  maxlength="6" name="telefone" class="form-control"
                                        value="{{ $responsavel->telefone }}" required>
                                </div>
                                <div class="col-4 my-2">
                                    <input type="text   " name="email" class="form-control"
                                        value="{{ $responsavel->email }}" required>
                                </div>
                            </div>

                        </form>

                        

                        <button form="editar" type="submit" class="btn btn-success mt-3"><i class="bi bi-check" title="Salvar"></i></button>

                        <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-reply-fill" title="Voltar"></i></button>

                        <button type="button" class="btn btn-danger delete-btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash" title="Apagar"></i></button>

                        <!-- Modal -->
                        <form action="{{ route('responsaveis.destroy', $responsavel->id) }} " id="apagar"
                            method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Você está prestes a excluir este responsável</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Tem certeza que deseja apagar o responsável ? </h4>
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



