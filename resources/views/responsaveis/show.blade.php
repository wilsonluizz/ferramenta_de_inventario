@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="text-center">{{ $responsavel->nome }}</h3>
                    </div>
                    <div class="card-body">

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Telefone: <strong>{{ $responsavel->telefone }}</strong></li>
                            <li class="list-group-item">E-mail: <strong>{{ $responsavel->email }}</strong>
                            </li>
                            <li class="list-group-item">Data de criação:
                                <strong>{{ date('d/m/Y', strtotime($responsavel->created_at)) }}<strong>
                            </li>
                        </ul>

                        <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3"><i class="bi bi-reply-fill" title="Voltar"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
