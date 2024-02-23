@extends('layouts.app')

@section('content')

<div class="row row-cols-1 pb-3">
        <div class="col">
            <div class="card">

                <div class="card-header pb-1">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="pt-1"><i class="bi bi-gear-fill me-3"></i> Configurações | Parametrização do sistema</h3>
                        </div>
                        <div class="col-4 text-end"></div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="table-responsive pb-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-12"><h4><i class="bi bi-people-fill pe-3"></i>Usuários</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-12"><a href="{{ route('usuarios.index') }}" class="nav-link d-block">Listar usuários</a></td>
                                </tr>
                                <tr>
                                    <td class="col-12"><a href="{{ route('usuarios.create') }}" class="nav-link d-block">Criar novo usuário</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive pb-4">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="col-12"><h4><i class="bi bi-person-badge pe-3"></i>Perfis e permissões</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="col-12"><a href="{{ route('perfis.index') }}" class="nav-link d-block">Listar perfis cadastrados</a></td>
                                </tr>
                                <tr>
                                    <td class="col-12"><a href="{{ route('perfis.create') }}" class="nav-link d-block">Criar novo perfil de usuário</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    @can('dev')
                        <div class="table-responsive pb-4">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-12"><h4 class="text-danger">
                                            <i class="bi bi-shield-fill-exclamation pe-3"></i>Regras das permissões</h4>
                                            <p>Apenas para desenvolvedores, manipula as regras permissões de acesso à plataforma.</p>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="col-12"><a href="{{ route('permissoes.index') }}" class="nav-link d-block">Listar permissões</a></td>
                                    </tr>
                                    <tr>
                                        <td class="col-12"><a href="{{ route('permissoes.create') }}" class="nav-link d-block">Criar nova permissão</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endcan

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
@endsection