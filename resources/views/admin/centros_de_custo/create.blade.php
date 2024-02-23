@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-plus-square-fill"></i> Criar novo centro de custo</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <form action="{{ route('centros-de-custo.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 my-2">
                                    <input type="text" maxlength="50" name="nome" class="form-control" placeholder="Nome" value="{{ old('nome') }}" required>
                                </div>
                                <div class="col-4 my-2">
                                    <input minlength="3" maxlength="3" type="text" name="codigo" class="form-control" placeholder=" Digite o codigo" required value="{{ old('codigo') }}">
                                </div>
                                <div class="col-md-4 my-2">
                                    <select name="select_resp" class="form-select" id="select_resp"
                                        aria-label="Floating label select example">
                                        <option value="">Selecione responsável </option>
                                        @foreach ($responsaveis as $resp)
                                            <option value="{{ $resp->id }}" {{ old('select_resp') == $resp->id ? 'selected' : null }}>{{ $resp->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-check"></i></button>
                            
                            <a class="btn btn-info mt-3" href="{{ route('centros-de-custo.index') }}">
                                <i class="bi bi-reply-fill"></i>
                            </a> 
                            
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
