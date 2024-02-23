@extends('layouts.app')

@section('content')

<div class="row row-cols-1 pb-3">
        <div class="col">
            <div class="card">

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="pt-1"><i class="bi bi-tag-fill me-3"></i> Categorias</h3>
                        </div>
                        <div class="col-4 text-end">
                            <a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#nova-categoria" data-toggle="tooltip" title="Nova categoria">
                                <span class="d-lg-none">
                                    <i class="bi bi-plus-lg"></i>
                                </span>
                                <span class="d-none d-lg-block">
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Nova categoria
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
                                    <th class="col-11">Categorias de produtos</th>
                                    <th class="col-1 text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($categorias) > 0)

                                    @foreach($categorias as $c)

                                        <tr>
                                            <td class="col-8">
                                                {{ $c->titulo }}
                                            </td>


                                            <td class="text-center">
                                                <a class="btn btn-secondary btn-modal ms-1" type="button" data-bs-toggle="modal" data-bs-target="#editar-{{$c->id}}" data-toggle="tooltip" title="Editar">
                                                    <i class="bi bi-pencil-fill"></i>
                                                </a>
                                            
                                                <a class="btn btn-danger btn-modal ms-1" type="button" data-bs-toggle="modal" data-bs-target="#confirmarExclusao-{{$c->id}}" data-toggle="tooltip" title="Excluir {{ $c->categoria }}">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <x-modal.confirmar-exclusao o="categoria" :n="$c->titulo" :id="$c->id" :modalId="'confirmarExclusao-' . $c->id" />
                                        <x-modal.editar objeto="categoria" :instancia="$c->id" form="forms.inventario.categoria" :modalId="'editar-' . $c->id" />

                                    @endforeach
                                @else

                                    <tr>
                                        <td class="col-12">Nenhuma categoria de produto registrada em sistema</td>
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

    <x-modal.criar objeto="categoria" form="forms.inventario.categoria" modalId="nova-categoria" />
@endsection