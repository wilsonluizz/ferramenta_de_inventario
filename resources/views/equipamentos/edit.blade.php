@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <h3 class="pt-1"><i class="bi bi-plus-square-fill"></i> Editar Equipamento</h3>
                    </div>
                    <div class="card-body">
                        <form id="form_create" action="{{ route('equipamentos.update', $equip->id) }}" method="POST"
                            class="row g-3">
                            @csrf
                            @method('put')
                            <div class="col-md-6">
                                <label for="titulo" class="form-label">Nome</label>
                                <input type="text" value="{{ $equip->titulo }}" minlength="4" maxlength="50"
                                    class="form-control" id="titulo" name="titulo" required>
                            </div>
                            <div class="col-md-3">
                                <label for="valor_equipamento" class="form-label">Valor</label>
                                <input type="text" value="{{ $equip->valor_equipamento }}" minlength="4" maxlength="50"
                                    class="form-control" id="valor_equipamento" name="valor_equipamento" required>
                            </div>
                            <div class="col-md-3">
                                <label for="select_tipo" class="form-label">Tipo</label>
                                <select name="select_tipo" class="form-select" id="select_tipo" aria-label="" required>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}"
                                            {{ $tipo->id == $equip->tipo->id ? 'selected' : '' }}>{{ $tipo->titulo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-6">
                                <label for="select_marca" class="form-label">Marca</label>
                                <select name="select_marca" class="form-select" id="select_marca" aria-label="" required>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}"{{ $marca->id == $equip->marca->id ? 'selected' : '' }}>{{ $marca->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="select_cc" class="form-label">Centro de custo</label>
                                <select name="select_cc" class="form-select" id="select_cc" aria-label="" required>
                                    @foreach ($centro_de_custo as $cc)
                                        <option value="{{ $cc->id }}"
                                            {{ $cc->id == $equip->centro_de_custo_id ? 'selected' : '' }}>
                                            {{ $cc->titulo }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="numero_serie" class="form-label">Número de série</label>
                                <input type="text" value="{{ $equip->numero_serie }}" minlength="5" maxlength="20"
                                    name="numero_serie" class="form-control" placeholder="Número de série" required>
                            </div>
                            
                            
                            <div class="col-md-6">
                                <label for="select_nota_fiscal" class="form-label">Número de nota fiscal</label>
                                <select name="select_nota_fiscal" class="form-select" id="select_nota_fiscal" aria-label="">
                                    <option value="">Adicionar nota fiscal</option>
                                    @foreach ($notafiscal as $nota)
                                        <option value="{{ $nota->id }}"{{$nota->id == $equip->nota_fiscal_id ? 'selected' : ''}}>
                                            {{ $nota->numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="patrimonio" class="form-label">Patrimônio</label>
                                <input type="text" class="form-control" name="patrimonio" value="{{ $equip->patrimonio }}">
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="descricao" class="form-label">Descreva os detalhes do equipamento</label>
                                <textarea name="descricao" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $equip->descricao }}</textarea>
                            </div>

                        </form>
                        


                        <button form="form_create" type="submit" class="btn btn-success mt-3"><i class="bi bi-check" title="Salvar"></i></button>

                        <a class="btn btn-info mt-3" href="{{ route('equipamentos.index') }}"><i class="bi bi-reply-fill" title="Voltar"></i></a> 

                        <button type="button" class="btn btn-danger delete-btn mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash" title="Apagar"></i></button>

                        {{-- modal --}}
                        <form action="{{ route('equipamentos.destroy', $equip->id) }} " id="apagar" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Você está prestes a excluir este equipamento</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Tem certeza que deseja apagar este equipamento? </h4>
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
