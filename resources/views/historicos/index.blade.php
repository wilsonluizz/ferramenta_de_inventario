@extends('layouts.app');

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mt-4">
                <div class="card-header">
                    <h2 class="text-center">Historicos</h2>
                </div>
                <div class="card-body">
                    <table class="table table-hover align-middle">
                        <thead>
                            <th>Atividade</th>
                            <th>Equipamento</th>
                            <th>Responsável</th>
                            <th>Data da atividade</th>
                        </thead>
                        <tbody>
                            @foreach ($historico as $registro)
                                <tr>
                                    <td>{{ $registro->atividade->atividade }}</td>
                                    <td>{{ $registro->equipamento->titulo }}</td>
                                    <td>{{ $registro->user->name }}</td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($registro->created_at)) }}</td>
            
            
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    <button onclick="javascript:history.back(-1) " type="button" class="btn btn-lg btn-info my-3"><i class="bi bi-reply-fill" title="Voltar"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection