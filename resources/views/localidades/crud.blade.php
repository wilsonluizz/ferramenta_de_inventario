@extends('layouts.app')

@section('content')

<div class="card">
    
    <div class="card-header pb-1">
        <div class="row">
            <div class="col-sm-9">
                <h3 class="pt-1 d-inline-block">
                    <i class="bi bi-geo-alt-fill me-3"></i>
                        Localidade    |

                        <span class="text-primary">
                            @if($metodo != 'create')
                                {{ ($metodo == 'edit' ? 'Editar ' : '') . $localidade->titulo }}
                            @else
                                Adicionar
                            @endif
                        </span>
                </h3>
            </div>
            <div class="col-sm-3 text-end">

                {{-- Exibe botão de exclusão --}}
                @if(($metodo == "edit") && Auth::user()->can('admin'))
                    <a class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#confirmarExclusao">
                        <i class="bi bi-trash-fill"></i>
                        <span class="d-none d-md-inline-block ms-2">
                            Excluir localidade
                        </span>
                    </a>

                    <x-modal.confirmar-exclusao o="localidades" :n="$localidade->titulo" :id="$localidade->id" modalId="confirmarExclusao" />
                @endif

                @if(($metodo == "show") && Auth::user()->can('admin'))

                {{-- Exibe botão de edição --}}
                <a class="btn btn-secondary" type="button" href="{{ route('localidades.edit', $localidade->id) }}">
                    <i class="bi bi-pencil-fill"></i>
                    <span class="d-none d-md-inline-block ms-2">
                        Editar procedimento
                    </span>
                </a>
                @endif
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">

                {{-- Se método não for apenas de exibição, abre o formuário --}}
                @if($metodo != 'show')

                    {{-- Se o método é de criação, abre o form --}}
                    @if($metodo == 'create')
                        <form action="{{ route('localidades.store') }}" method="POST">

                    {{-- Se o método é de edição, incluir o PUT --}}
                    @else
                        <form action="{{ route('localidades.update', $localidade->id) }}" method="POST">
                        @method('PUT')
                    @endif

                    {{-- Inclui o token CSRF --}}
                    @csrf
                @endif

                {{-- INÍCIO DO FORMULÁRIO --}}

                {{-- Primeiro bloco --}}
                <div class="row pb-3">

                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <h5>Identificação da localidade</h5>
                    </div>

                    <div class="col-sm-12 col-md-9 col-lg-9">

                        {{-- Primeira linha --}}
                        <div class="row pb-3">
                            <div class="col-lg-6">
                                <x-utils.formidable.text-input :metodo="$metodo" :objeto="$localidade" identificador="titulo" label="Identificador (Nome único)" dica="Campo obrigatório" />
                            </div>
                            <div class="col-lg-6">
                                <x-utils.formidable.select :metodo="$metodo" :objeto="$localidade_tipos" identificador="localidade_tipo_id" label="Tipo de localidade" dica="Campo obrigatório" :selected="(!is_null($localidade) ? $localidade->localidade_tipo_id : null)" />
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="row pb-1">
                    <hr />
                </div>
                
                {{-- Segundo bloco --}}
                <div class="row pb-3">

                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <h5>Localização geográfica</h5>
                    </div>

                    <div class="col-sm-12 col-md-9 col-lg-9">

                        {{-- Primeira linha --}}
                        <div class="row pb-3">

                            <div class="col-lg-2">
                                <x-utils.formidable.text-input :metodo="$metodo" :objeto="$localidade" identificador="cep" label="CEP" />
                            </div>
                            
                            <div class="col-lg-7">
                                <x-utils.formidable.text-input :metodo="$metodo" :objeto="$localidade" identificador="logradouro" label="Endereço" />
                            </div>

                            <div class="col-lg-1">
                                <x-utils.formidable.text-input :metodo="$metodo" :objeto="$localidade" identificador="numero" label="Número" />
                            </div>

                            <div class="col-lg-2">
                                <x-utils.formidable.text-input :metodo="$metodo" :objeto="$localidade" identificador="complemento" />
                            </div>

                        </div>

                        {{-- Segunda linha --}}
                        <div class="row pb-3">

                            <div class="col-lg-3">
                                <x-utils.formidable.text-input :metodo="$metodo" :objeto="$localidade" identificador="bairro" />
                            </div>
                            
                            <div class="col-lg-4">
                                <x-utils.formidable.text-input :metodo="$metodo" :objeto="$localidade" identificador="cidade" />
                            </div>

                            <div class="col-lg-1">
                                <x-utils.formidable.text-input :metodo="$metodo" :objeto="$localidade" identificador="uf" label="UF" />
                            </div>

                            <div class="col-lg-2">
                                <x-utils.formidable.text-input :metodo="$metodo" :objeto="$localidade" identificador="latitude" />
                            </div>

                            <div class="col-lg-2">
                                <x-utils.formidable.text-input :metodo="$metodo" :objeto="$localidade" identificador="longitude" />
                            </div>

                        </div>


                    </div>

                </div>
                

                {{-- Fecha os campos de formulário --}}
                @if($metodo != 'show')

                    <div class="row pb-1">
                        <hr />
                    </div>

                    <div class="row">
                        <div class="col-sm-6 text-start">
                            <a href="{{ route('localidades.index') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-return-left fs-5"></i>
                                <span class="d-none d-md-inline-block ms-2">
                                    Voltar
                                </span>
                            </a>
                        </div>
                        <div class="col-sm-6 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi {{ ($metodo == 'create' ? 'bi-save' : 'bi-pencil-square') }} fs-5"></i>
                                <span class="d-none d-md-inline-block ms-2">
                                    {{ ($metodo == 'create' ? 'Salvar' : 'Editar') }}
                                </span>
                            </button>
                        </div>
                    </div>

                    </form>
                @endif

            </div>
        </div>
    </div>
</div>

@endsection


@if($metodo != 'show')

    @section('js')
        <script src="{{ asset('js/consultaCEP.js') }}"></script>
        <script src="{{ asset('js/consultaNominatim.js') }}"></script>


        <script src="https://unpkg.com/imask"></script>

        <script>
            var mask = IMask(document.getElementById('cep'), {
                mask: '00000-000'
            });
        </script>
    @endsection
    
@endif