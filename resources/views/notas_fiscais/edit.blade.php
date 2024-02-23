@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-pencil"></i> Editar Nota fiscal</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('notas-fiscais.update', $nota->id) }}" id="editar"
                            method="POST">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-3 my-2">
                                    <input maxlength="9" disabled type="text" maxlength="50" name="numero" class="form-control"
                                        value="{{ $nota->numero }}"" required>
                                </div>
                                <div class="col-3 my-2">
                                    <input disabled type="text" maxlength="50" name="valor" class="form-control"
                                        value="R$ {{ $nota->valor }}" required>
                                </div>
                                <div class="col-3 my-2">
                                    <input minlength="3" maxlength="3" disabled type="text" name="sc_origem" class="form-control"
                                        value="{{ $nota->sc_origem }}" required>
                                </div>
                                <div class="col-3 my-2">
                                    <input disabled type="dateTime" name="data_emissao" class="form-control"
                                        value={{ date('d/m/Y', strtotime($nota->data_emissao)) }} required>
                                </div>
                            </div>

                        </form>

                        <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-reply-fill" title="Voltar"></i></button>


                        <button type="button" class="btn btn-md btn-danger delete-btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash" title="Apagar"></i></button>

                        <!-- Modal -->
                        <form action="{{ route('notas-fiscais.destroy',  $nota->id) }} " id="apagar" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Você está prestes a excluir um documento</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Tem certeza que deseja apagar esta nota fiscal? </h4>
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



<button type="button" class="btn btn-danger delete-btn " data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></button>