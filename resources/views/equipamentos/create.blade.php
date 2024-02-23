@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <h3 class="pt-1"><i class="bi bi-plus-square-fill"></i> Novo Equipamento</h3>
                    </div>
                    <div class="card-body">
                        <form id="form_create" action="{{ route('equipamentos.store') }}" method="POST" class="row g-3">
                            @csrf
                            <div class="col-md-6">
                                <label for="inputnome" class="form-label">Nome</label>
                                <input type="text" minlength="4" maxlength="50" class="form-control" name="titulo"
                                    placeholder="Nome" value="{{ old('titulo') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="valor_equipamento" class="form-label">Valor</label>
                                <input type="text" minlength="4" maxlength="50" class="form-control" name="valor_equipamento"
                                    placeholder="Informe o valor_equipamento do equipamento" value="{{ old('valor_equipamento') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="select_tipo" class="form-label">Tipo</label>
                                <select name="select_tipo" class="form-select" id="select_tipo" aria-label="" required>
                                    <option value="">Selecione o tipo</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->id }}"
                                            {{ old('select_tipo') == $tipo->id ? ' selected' : null }}>{{ $tipo->titulo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="select_marca" class="form-label">Marca</label>
                                <select name="select_marca" class="form-select" id="select_marca" aria-label="" required>
                                    <option value="">Selecione marca</option>
                                    @foreach ($marcas as $marca)
                                        <option value="{{ $marca->id }}"
                                            {{ old('select_marca') == $marca->id ? ' selected' : null }}>{{ $marca->titulo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="select_cc" class="form-label">Centro de custo</label>
                                <select name="select_cc" class="form-select" id="select_cc" aria-label="" required>
                                    <option value="">Selecione o centro de custo</option>
                                    @foreach ($centro_de_custo as $cc)
                                        <option value="{{ $cc->id }}"
                                            {{ old('select_cc') == $cc->id ? ' selected' : null }}>{{ $cc->titulo }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="numero_serie" class="form-label">Número de série</label>
                                <input type="text" minlength="5" maxlength="20" name="numero_serie" class="form-control"
                                    placeholder="Número de série" required value="{{ old('numero_serie') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="select_nota_fiscal" class="form-label">Número de nota fiscal</label>
                                <select name="select_nota_fiscal" class="form-select" id="select_nota_fiscal" aria-label="">
                                    <option value="">Nota fiscal do equipamento</option>
                                    @foreach ($nota_fiscal as $nota)
                                        <option value="{{ $nota->id }}"
                                            {{ old('select_nota_fiscal') == $nota->id ? ' selected' : null }}>
                                            {{ $nota->numero }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="patrimonio" class="form-label">Patrimônio</label>
                                <input type="text" class="form-control" name="patrimonio"
                                    placeholder="Se o equipamento for patrimoniado, digite-o codigo aqui"
                                    value="{{ old('patrimonio') }}">
                            </div>
                            <div class=" col-md-6 mb-3">
                                <label for="descricao" class="form-label">Descreva os detalhes do equipamento</label>
                                <textarea name="descricao" class="form-control" id="" rows="3" required>{{ old('descricao')}}</textarea>
                            </div>

                            <div class="col-12">
                                <button form="form_create" type="submit" class="btn btn-success mt-3"><i
                                        class="bi bi-check"></i></button>
                                <a class="btn btn-info mt-3" href="{{ route('equipamentos.index') }}">
                                    <i class="bi bi-reply-fill"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
