@extends('layouts.app')

@section('content')
<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">

            <div class="card-header pb-1">
                <div class="row">
                    <div class="col-10">
                        <h3 class="pt-1"><i class="bi bi-receipt-cutoff"></i> Notas Fiscais</h3>
                    </div>
                    <div class="col-2 text-end">
                        <a class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#nova-nf" data-toggle="tooltip" title="Nova Nota Fiscal">
                            <span class="d-lg-none">
                                <i class="bi bi-plus-lg"></i>
                            </span>
                            <span class="d-none d-lg-block">
                                <i class="bi bi-plus-lg me-1"></i>
                                Nova nota fiscal
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th class="col-2">Número da NF</th>
                            <th class="col-2">Valor</th>
                            <th class="col-">SC. origem</th>
                            <th class="col-2">Criado em</th>
                            <th class="col-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notas_fiscais as $nota)
                        <tr class="align-middle">
                            <td>{{  $nota->numero }}</td>
                            <td>R$ {{ $nota->valor }}</td>
                            <td>{{  $nota->sc_origem }}</td>
                            
                            <td>{{ date('d/m/Y', strtotime( $nota->created_at)) }}</td>
                            <td class="text-center">
                                
                                
                                @can('admin')

                                    @if($nota->arquivo)
                                        <button class="btn btn-primary ms-1" type="button" data-toggle="tooltip" title="Ver arquivo da Nota" @if(!$nota->arquivo) disabled style="visibility: hidden" @endif>
                                            <i class="bi bi-file-earmark"></i>
                                        </button>
                                        {{-- <x-modal.editar objeto="marca" :instancia="$m->id" form="forms.inventario.marca" :modalId="'editar-' . $m->id" /> --}}
                                    @else
                                        <button class="btn btn-primary" data-toggle="tooltip" title="Não possui arquivo de Nota" disabled>
                                            <i class="bi bi-file-earmark-x"></i>
                                        </button>
                                    @endif

                                    {{-- <a class="btn btn-secondary ms-1" type="button" data-bs-toggle="modal" data-bs-target="#editar-{{$nota->id}}" data-toggle="tooltip" title="Editar">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a> --}}

                                    <a class="btn btn-danger btn-modal ms-1" type="button" data-bs-toggle="modal" data-bs-target="#confirmarExclusao-{{$nota->id}}" data-toggle="tooltip" title="Excluir">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>

                                    <x-modal.editar objeto="Nota Fiscal" :instancia="$nota->id" form="forms.inventario.nota-fiscal" :modalId="'editar-' . $nota->id" />
                                    <x-modal.confirmar-exclusao o="notas-fiscais" :n="'Nota Fiscal ' . $nota->numero" :id="$nota->id" :modalId="'confirmarExclusao-' . $nota->id" />
                                @endcan
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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

<x-modal.criar objeto="Nota Fiscal" form="forms.inventario.nota-fiscal" modalId="nova-nf" metodo="create" />

@endsection