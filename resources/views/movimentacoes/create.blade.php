@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header pb-1">
                        <h2 class="pt-1"><i class="bi bi-plus-square-fill"></i> Nova movimentação</h2>
                    </div>
                    <div class="card-body table-responsive">

                        <form id="form_mov" action="{{ route('movimentacao.store', $equipamento->id)  }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <label for="select_equip" class="form-label">Equipamento</label>
                                    <input type="hidden" name="select_equip" value="{{ $equipamento->id }}">
                                    <select name="select_equip" class="form-select" id="select_equip" disabled>
                                            <option selected value="{{ $equipamento->id }}">{{ $equipamento->titulo }}</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="select_tipo_mov" class="form-label">Tipo de movimentação</label>
                                    <select name="select_tipo_mov" id="select_tipo_mov" class="form-select">
                                        <option value="">Selecione o tipo de movimentação</option>
                                        @foreach ($tipo_mov as $tipo)
                                            <option value="{{ $tipo->id }}">{{ $tipo->titulo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <label for="motivo" class="form-label">Descreva o motivo da movimentação</label>
                                    <textarea name="motivo" class="form-control" id="motivo" rows="4"></textarea>
                                </div>
                            </div>
                            <button form="form_mov" type="submit" class="btn btn-success mt-3"><i class="bi bi-check" title="Salvar"></i></button>
                            <button onclick="javascript:history.back(-1) " type="button"
                            class="btn btn-info mt-3"><i class="bi bi-reply-fill" title="Voltar"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
