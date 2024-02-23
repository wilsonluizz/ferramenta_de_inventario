@extends('layouts.app')

@section('content')
    <div class="row text-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Novo emprestimo</h5>
                    <h6 class="card-subtitle mb-2">Solicite os materiais que precisa aqui</h6>
                    <form id="solicita_emprestimo" action="{{ route('emprestimos.store') }}" method="POST">
                        @csrf
                        <select style="width: 20em" class="js-example-basic-multiple" multiple="multiple" name="equipamentos_solicitados[]" required>
                            <option selected disabled value="">Selecione o material</option>
                            @foreach ($equipamentos_genericos as $equipamento)
                                <option value="{{ $equipamento->id }}">{{ $equipamento->titulo }}</option>
                            @endforeach
                        </select>
                        <div class="row mt-3">
                            <div class="col-4">
                                <button form="solicita_emprestimo" type="submit" class="btn btn-primary px-5 radius-30">
                                    Solicitar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Solicitações Pendentes</h5>
                    <ul class="list-group">
                        @if ($solicitacoes != null)
                            @foreach ($solicitacoes as $solicitacao)
                                @if ($solicitacao->client_solicitante_id == \Auth::user()->id and $solicitacao->status_id === 3)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $solicitacao->equipamentosGenericos->titulo }}
                                        <span class="badge bg-primary rounded-pill"><strong>Status:
                                            </strong>{{ $solicitacao->status->status }}</span>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <p>Você não possui solocitaçoes em aberto</p>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Solicitações aprovadas</h5>
                    <ul class="list-group">
                        @if ($solicitacoes != null)
                            @foreach ($solicitacoes as $solicitacao)
                                @if ($solicitacao->client_solicitante_id == \Auth::user()->id and $solicitacao->status_id === 1)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $solicitacao->equipamentosGenericos->titulo }}
                                        <span class="badge bg-primary rounded-pill"><strong>Status:
                                            </strong>{{ $solicitacao->status->status }}</span>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <p>Você não possui solocitaçoes em aberto</p>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Solicitações Negadas</h5>
                    <ul class="list-group">
                        @if ($solicitacoes != null)
                            @foreach ($solicitacoes as $solicitacao)
                                @if ($solicitacao->client_solicitante_id == \Auth::user()->id and $solicitacao->status_id === 2)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $solicitacao->equipamentosGenericos->titulo }}
                                        <span class="badge bg-primary rounded-pill"><strong>Status:
                                            </strong>{{ $solicitacao->status->status }}</span>
                                    </li>
                                @endif
                            @endforeach
                        @else
                            <p>Você não possui solocitaçoes em aberto</p>
                        @endif


                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#seleciona_equipamento_gen').ready(function() {
            $('.js-example-basic-multiple').select2();
            
        });

        // $('#seleciona_equipamento_gen').select2({
        //     multiple: true
        // });
    </script>
@endsection
