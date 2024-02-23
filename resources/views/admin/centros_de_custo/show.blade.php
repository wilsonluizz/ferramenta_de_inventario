@extends('layouts.app')
@section('content')

<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">

            <div class="card-header">
                <h3 class="pt-1"><i class="bi bi-currency-dollar"></i> Centro de custo | <span class="text-primary">{{ $centro_de_custo->titulo }}</span></h3>
                <h3 class="text-center"></h3>
            </div>

            {{-- Informações pessoais --}}
            <div class="card-body">
                <div class="row pb-3">

                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <h5>Informações do centro de custo</h5>
                    </div>
                    
                    
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9">

                        {{-- Nome --}}
                        <div class="row pb-4">
                            <div class="col">

                                <label class="d-block fw-bold">Centro de custo</label>
                                {{ $centro_de_custo->titulo }}

                            </div>
                        </div>

                        <div class="row pb-4">

                            {{-- Código SAP --}}
                            <div class="col-lg-6">

                                <label class="d-block fw-bold">Código SAP</label>
                                {{ $centro_de_custo->codigo_sap }}

                            </div>

                            {{-- Código Tasy --}}
                            <div class="col-lg-6">

                                <label class="d-block fw-bold">Código Tasy</label>
                                {{ $centro_de_custo->codigo_tasy }}

                            </div>

                        </div>
                    </div>
                </div>

                {{-- USUÁRIOS --}}
                <hr />

                <div class="row pb-3">

                    <div class="col-12 col-sm-12 col-md-3 col-lg-3">
                        <h5>Usuários associados</h5>
                        <p class="text-secondary">
                            <span class="badge bg-danger me-1">Atenção</span>
                            Esses usuários podem ver os equipamentos registrados no centro de custo {{ $centro_de_custo->titulo }}
                        </p> 
                    </div>
                    
                    
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9">

                        <div class="row table-responsive">

                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th class="col-12">Nome</small></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($centro_de_custo->users as $u)
                                        <tr>
                                            <td>{{ $u->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-10 mt-1">
                        <a class="text-muted pt-2 text-decoration-none" href="{{ route('admin') }}">
                            <i class="bi bi-arrow-return-left"></i>
                            <span class="ms-2">Voltar à página anterior</span>
                        </a>
                    </div>

                    <div class="col-2 text-end"></div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection