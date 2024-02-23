@extends('layouts.app')


@section('content')
    <div class="row row-cols-1 pb-3">
        <div class="col">
            <div class="card">

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="pt-1"><i class="bi bi-pc-display"></i> Equipamentos</h3>
                        </div>
                        <div class="col-4 text-end">
                            <a class="btn btn-primary" href="{{ route('equipamentos.create') }}" data-toggle="tooltip"
                                title="Criar novo equipamento">
                                <span class="d-lg-none">
                                    <i class="bi bi-plus-lg"></i>
                                </span>
                                <span class="d-none d-lg-block">
                                    <i class="bi bi-plus-lg me-1"></i>
                                    Novo equipamento
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive">
                    <table id="tabela_equipamento" class="dataTables_length table table-striped table-hover align-middle">
                        <thead>
                            <tr>
                                <th class="col-2">Equipamento</th>
                                <th class="col-2">Marca</th>
                                <th class="col-2">Categoria</th>
                                <th class="col-2 text-center">Tipo</th>
                                <th class="col-2 text-center">Centro de custo</th>
                                <th class="col-2 text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipamentos as $equip)
                                <tr>
                                    <td>{{ $equip->titulo }}</td>
                                    <td>{{ $equip->marca->titulo }}</td>
                                    <td>{{ $equip->tipo->categoria->titulo }}</td>
                                    <td class="text-center">{{ $equip->tipo->titulo }}</td>
                                    <td class="text-center">{{ $equip->centroDeCusto->titulo }}</td>



                                    <td class="text-center">

                                        @can('admin')
                                            <a class="btn btn-info" href="{{ route('equipamentos.show', $equip->id) }}"
                                                data-toggle="tooltip" title="Ver detalhes">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>

                                            <a class="btn btn-primary" href="{{ route('equipamentos.edit', $equip->id) }}"
                                                data-toggle="tooltip" title="Editar {{ $equip->titulo }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a class="btn btn-primary" href="{{ route('movimentacao.create', $equip->id) }}"
                                                data-toggle="tooltip" title="Movimentação {{ $equip->titulo }}">
                                                <i class="bi bi-arrows-move"></i>
                                            </a>
                                        @else
                                            <a class="btn btn-primary" href="{{ route('equipamentos.show', $equip->id) }}"
                                                data-toggle="tooltip" title="Ver detalhes de {{ $equip->titulo }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#tabela_equipamento').DataTable();
        });
    </script>
@endsection
