@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header pb-1">
                        <div>
                            <h3 class="pt-1"><i class="bi bi-plus-square-fill"></i> Adicionar responsável</h3>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        
                        <form action="{{ route('responsaveis.store') }}" method="POST">
                            @csrf
                            <div class="row my-2">

                                {{-- <div class="col-3 my-2">
                                    <input type="text" maxlength="50" name="cep" class="form-control"
                                        placeholder="Cep" required value="{{ old('cep') }}" id="cep">
                                </div> --}}
                                <div class="col-5 my-2">
                                    <input id="nome" type="text" maxlength="50" name="nome" class="form-control"
                                        placeholder="Nome" required value="{{ old('nome') }}">
                                </div>
                                <div class="col-5 my-2">
                                    <input id="cpf" type="text" maxlength="50" name="cpf" class="form-control"
                                        placeholder="CPF" required value="{{ old('cpf') }}">
                                </div>
                                <div class="col-4 my-2">
                                    <input id="rg" type="text" name="rg" class="form-control" placeholder="RG" required value="{{ old('rg') }}">
                                </div>
                                <div class="col-4 my-2">
                                    <input id="telefone" type="text" name="telefone" class="form-control" placeholder="Telefone">
                                </div>
                                <div class="col-4 my-2">
                                    <input type="email" class="form-control" name="email" required placeholder="E-mail" value="{{ old('email') }}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success mt-3"><i class="bi bi-check"></i></button>
                            
                            <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-reply-fill"></i></button>
                            </a>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection