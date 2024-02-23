@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-5">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-center">{{ $local->nome }}</h3>
                        </div>
                        <div class="card-body">

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Cep:</strong> {{ $local->cep }}</li>
                                <li class="list-group-item"><strong>Logradouro:</strong> {{ $local->logradouro }}
                                </li>
                                <li class="list-group-item"><strong>Bairro:</strong> {{ $local->bairro }}
                                </li>
                                <li class="list-group-item"><strong>Cidade:</strong> {{ $local->cidade }}
                                </li>
                                <li class="list-group-item"><strong>UF:</strong> {{ $local->uf }}
                                </li>
                                <li class="list-group-item"><strong>Numero:</strong> {{ $local->numero }}
                                </li>
                                <li class="list-group-item"><strong>Complemento</strong>
                                    @empty($local->complemento)
                                        Endereço sem complemento
                                    @endempty{{ $local->complemento }}
                                </li>
                                <li class="list-group-item"><strong>Criado em:</strong>
                                    {{ date('d/m/Y', strtotime($local->created_at)) }}
                                </li>
                            </ul>
                            
                            <button onclick="javascript:history.back(-1) " type="button" class="btn btn-info mt-3" title="Voltar"><i class="bi bi-reply-fill"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection