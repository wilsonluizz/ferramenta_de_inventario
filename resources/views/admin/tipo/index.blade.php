@extends('layouts.app')

@section('content')

<div class="row row-cols-1 pb-3">
        <div class="col">
            <div class="card">

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="pt-1"><i class="bi bi-box-seam-fill me-3"></i> Tipos de equipamento</h3>
                        </div>
                        <div class="col-4 text-end">
                            <a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#nova-categoria" data-toggle="tooltip" title="Novo tipo">
                                <span class="d-lg-none">
                                    <i class="bi bi-plus-lg"></i>
                                </span>
                                <span class="d-none d-lg-block">
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Novo tipo
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive pb-4">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th class="col-4">Tipos de equipamento</th>
                                    <th class="col-3">Categoria contábil</th>
                                    <th class="col-4">Conta contábil</th>
                                    <th class="col-1 text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if(count($tipos) > 0)

                                    @foreach($tipos as $t)

                                        <tr>
                                            <td class="col-3 fw-bold text-primary">
                                                {{ $t->titulo }}
                                            </td>
                                            <td class="col-3">
                                                {{ $t->categoria->titulo }}
                                            </td>
                                            <td class="col-4">
                                                {{ $t->categoria->ContabilConta->codigo_sap }} - {{ $t->categoria->ContabilConta->alias }}
                                            </td>


                                            <td class="col-2 text-center">
                                                <a class="btn btn-secondary btn-modal ms-1" type="button" data-bs-toggle="modal" data-bs-target="#editar-{{$t->id}}" data-toggle="tooltip" title="Editar">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                            
                                                <a class="btn btn-danger btn-modal ms-1" type="button" data-bs-toggle="modal" data-bs-target="#confirmarExclusao-{{$t->id}}" data-toggle="tooltip" title="Excluir {{ $t->titulo }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <x-modal.confirmar-exclusao o="tipo" :n="$t->titulo" :id="$t->id" :modalId="'confirmarExclusao-' . $t->id" />
                                        {{-- <x-modal.editar objeto="categoria" :instancia="$t->id" form="forms.inventario.categoria" :modalId="'editar-' . $t->id" /> --}}

                                    @endforeach
                                @else

                                    <tr>
                                        <td colspan="2" class="col-12">Nenhum tipo de equipamento registrada em sistema</td>
                                    </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="card-footer">
                    <div class="row">
                        <div class="col-8 mt-1">
                            <a class="text-muted pt-2 text-decoration-none" href="{{ route('admin') }}">
                                <i class="bi bi-arrow-return-left"></i>
                                <span class="ms-2">Voltar à página anterior</span>
                            </a>
                        </div>
    
                        <div class="col-4 text-center"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    {{-- <x-modal.criar objeto="categoria" form="forms.inventario.categoria" modalId="nova-categoria" /> --}}
@endsection