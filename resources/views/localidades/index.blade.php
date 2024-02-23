@extends('layouts.app')

@section('content')
<div class="row row-cols-1 pb-3">
    <div class="col">
        <div class="card">

            <div class="card-header pb-1">
                <div class="row">
                    <div class="col-10">
                        <h3 class="pt-1">
                            <i class="bi bi-geo-alt-fill me-3"></i> Localidades
                        </h3>
                    </div>
                    <div class="col-2 text-end">
                        <a class="btn btn-primary" href="{{ route('localidades.create') }}" data-toggle="tooltip" title="Criar nova Localidade">
                            <span class="d-lg-none">
                                <i class="bi bi-plus-lg"></i>
                            </span>
                            <span class="d-none d-lg-block">
                                <i class="bi bi-plus-lg me-1"></i>
                                Nova localidade
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th class="col-3">Identificador (nome)</th>
                            <th class="col-3">Cidade</th>
                            <th class="col-1">UF</th>
                            <th class="col-2">Tipo de localidade</th>
                            <th class="col-1 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($localidades as $local)
                        <tr class="align-middle">
                            <td>{{ $local->titulo }}</td>
                            <td>{{ $local->cidade }}</td>
                            <td>{{ $local->uf }}</td>
                            
                            <td>
                                {{ $local->localidadeTipo->titulo }}
                            </td>
                            <td class="text-center">
                                
                                @can('admin')
                                    <a class="btn btn-primary" href="{{ route('localidades.show', $local->id) }}" data-toggle="tooltip" title="Ver detalhes">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>

                                    <a class="btn btn-secondary" href="{{ route('localidades.edit', $local->id) }}" data-toggle="tooltip" title="Editar {{ $local->name }}">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a> 

                                @else
                                     <a class="btn btn-primary" href="{{ route('localidades.show', $local->id) }}" data-toggle="tooltip" title="Ver detalhes">
                                        <i class="bi bi-eye-fill"></i>
                                    </a> 
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="{{ $localidades->previousPageUrl() }}">Voltar</a></li>
                      @for ($i = 1; $i <= $localidades->lastPage(); $i++)
                        <li class="page-item {{ $localidades->currentPage() == $i ? 'active' : '' }}"><a class="page-link" href="{{ $localidades->url($i) }}">{{ $i }}</a></li> 
                      @endfor
                      <li class="page-item"><a class="page-link" href="{{ $localidades->nextPageUrl() }}">Avançar</a></li>
                    </ul>
                  </nav>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-10 mt-1">
                        <a class="text-muted pt-2 text-decoration-none" href="{{ route('home') }}">
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