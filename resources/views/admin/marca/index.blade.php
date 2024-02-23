@extends('layouts.app')

@section('content')

<div class="row row-cols-1 pb-3">
        <div class="col">
            <div class="card">

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="pt-1"><i class="bi bi-c-circle me-3"></i> Marcas</h3>
                        </div>
                        <div class="col-4 text-end">
                            <a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#nova-marca" data-toggle="tooltip" title="Nova marca">
                                <span class="d-lg-none">
                                    <i class="bi bi-plus-lg"></i>
                                </span>
                                <span class="d-none d-lg-block">
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Nova marca
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
                                    <th class="col-11">Marcas de produtos</th>
                                    <th class="col-1 text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($marcas) > 0)

                                    @foreach($marcas as $m)

                                        <tr>
                                            <td class="col-8">
                                                {{ $m->titulo }}
                                            </td>


                                            <td class="col-4 text-center">
                                                <a class="btn btn-secondary btn-modal ms-1" type="button" data-bs-toggle="modal" data-bs-target="#editar-{{$m->id}}" data-toggle="tooltip" title="Editar">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                            
                                                <a class="btn btn-danger btn-modal ms-1" type="button" data-bs-toggle="modal" data-bs-target="#confirmarExclusao-{{$m->id}}" data-toggle="tooltip" title="Excluir {{ $m->marca }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <x-modal.confirmar-exclusao o="marca" :n="$m->titulo" :id="$m->id" :modalId="'confirmarExclusao-' . $m->id" />
                                        <x-modal.editar objeto="marca" :instancia="$m->id" form="forms.inventario.marca" :modalId="'editar-' . $m->id" />

                                    @endforeach
                                @else

                                    <tr>
                                        <td class="col-12">Nenhuma marca de produto registrada em sistema</td>
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
    
                        <div class="col-4 text-end"></div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <x-modal.criar objeto="marca" form="forms.inventario.marca" modalId="nova-marca" />
@endsection