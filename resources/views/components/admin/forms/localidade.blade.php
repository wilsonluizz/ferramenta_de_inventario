@if (!is_null($type))
    <form action="{{ $type == 'edit' ? route('localidades.update', $localidade->id) : route('localidades.store') }}"
        method="post">
        @csrf

        @if ($type == 'edit')
            @method('PUT')
        @endif

@endif

<div class="card-header pb-1">
    <div class="row">
        <div class="col-8">
            <h3 class="pt-1">
                <i class="bi bi-geo-alt-fill"></i>
                <span class="text-secondary">Localidade |</span>

                @if (!is_null($type))
                    @if ($type == 'edit')
                        Editar {{ $localidade->titulo }}
                    @else
                        Criar
                    @endif
                @else
                    {{ $localidade->titulo }}
                @endif

            </h3>
        </div>

        <div class="col-4 text-end">

            @if (!is_null($type))

                {{-- 
                    EDIT | Habilita exclusão caso tenha essa permissão.
                    Não permite excluir as permissões 'admin' e 'dev'
                --}}
                @if ($type == 'edit' && $localidade->id > 1)
                    @can('admin')
                        <a class="btn btn-danger" type="button" data-toggle="tooltip"
                            title="Apagar {{ $localidade->titulo }}" data-bs-toggle="modal"
                            data-bs-target="#confirmarExclusao">
                            <span class="d-xs-block d-lg-none">
                                <i class="bi bi-trash-fill"></i>
                            </span>
                            <span class="d-none d-lg-block">
                                <i class="bi bi-trash-fill me-1"></i>
                                Excluir usuário
                            </span>
                        </a>

                        <x-modal.confirmar-exclusao o="localidades" :n="$localidade->titulo" :id="$localidade->id"
                            modalId="confirmarExclusao" />
                    @endcan
                @endif


                {{-- SHOW || Habilita edição caso tenha essa permissão --}}
            @else
                @can('admin')
                    <div class="d-xs-block d-lg-none">
                        <a href="{{ route('localidades.edit', $localidade->id) }}" class="btn btn-secondary">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>

                    <div class="d-none d-lg-block">
                        <a href="{{ route('localidades.edit', $localidade->id) }}" class="btn btn-secondary">
                            <i class="bi bi-pencil-square"></i>
                            Editar localidade
                        </a>
                    </div>
                @endcan
            @endif

        </div>
    </div>
</div>
<div class="card-body">
    <div class="row pb-3">

        <div class="col-12 col-sm-12 col-md-3 col-lg-3">
            <label for="cep" class="d-block fw-bold">
                Cep da localidade
            </label>
            {{-- EDIT / CREATE || Campo de formulário Nome --}}
            @if (!is_null($type))

                <input type="text" name="cep" class="form-control" id="cep" aria-describedby="dicaNome"
                    value="{{ old('cep') }}" id="cep">
                @if ($type == 'edit')
                    value="{{ $local->cep }}"
                @endif
                <small id="dicaNome" class="form-text text-muted"><strong>Obrigatório</strong>. Digite apenas
                    números</small>

                {{-- SHOW || Exibe Nome --}}
            @else
                {{ $usuario->name }}
            @endif
        </div>
        <div class="col-12 col-sm-12 col-md-9 col-lg-9">

            <div class="row pb-4">

                {{-- Logradouro --}}
                <div class="col-lg-6">
                    <label for="email" class="d-block fw-bold">
                        Logradouro
                    </label>

                    {{-- EDIT / CREATE || Campo de formulário E-mail --}}
                    @if (!is_null($type))
                        <input readonly id="logradouro" type="text" maxlength="50" name="logradouro"
                            class="form-control" placeholder="Logradouro" required value="{{ old('logradouro') }}"
                            @if ($type == 'edit') value="{{ $local->logradouro }}" @endif>
                        {{-- SHOW || Exibe a localidade --}}
                    @else
                        {{ $local->logradouro }}
                    @endif
                </div>
                {{-- numero --}}
                <div class="col-lg-2">
                    <label for="email" class="d-block fw-bold">
                        Número
                    </label>
                    <input max="5" type="text" name="numero" class="form-control" placeholder="N°" value="{{old('numero')}}" required @if ($type == 'edit')
                        value="{{$local->numero}}"
                    @endif > 
                </div>
                {{-- complemento --}}
                <div class="col-lg-4">
                    <label for="complemento" class="d-block fw-bold">
                        Complemento
                    </label>
                    <input id="complemento" type="text" name="complemento" class="form-control" placeholder="Complemento" value="{{old('complemento')}}" @if ($type == 'edit') value="{{ $local->complemento }}" @endif>
                </div>
            </div>
        </div>
    </div>
    <div class="row pb-3">
        {{-- Bairro --}}
        <div class="col-lg-4">
            <label for="bairro" class="d-block fw-bold">
                Bairro
            </label>
            <input readonly id="bairro" type="text" maxlength="50" name="bairro" class="form-control"
                placeholder="Bairro" required value="{{ old('bairro') }}" @if ($type == 'edit') value="{{ $local->bairro }}" @endif>
        </div>
        {{-- cidade --}}
        <div class="col-lg-3">
            <label for="cidade" class="d-block fw-bold">
                Cidade
            </label>
            <input readonly id="cidade" type="text" name="cidade" class="form-control" placeholder="Cidade" required value="{{ old('cidade') }}" @if ($type == 'edit') value="{{ $local->cidade }}" @endif>
        </div>
        <div class="col-lg-3">
            <label for="uf" class="d-block fw-bold">
                Unidade federativa
            </label>
            <input readonly id="uf" type="text" name="uf" class="form-control" placeholder="UF" value="{{old('uf')}}" required @if ($type == 'edit') value="{{ $local->uf }}" @endif>
        </div>
        
    </div>
    <div class="row pb-3">
        {{-- responsavel --}}
        <div class="col-lg-4">
            <label for="responsavel" class="d-block fw-bold">
                Responsável
            </label>
            <select id="responsavel" name="responsavel_id" class="form-select" aria-label="Default select example">
                <option selected value="">Selecione o responsável da localidade</option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>
        {{-- titulo --}}
        <div class="col-lg-4">
            <label for="responsavel" class="d-block fw-bold">
                Nome da localidade
            </label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Nome da localidade">
        </div>
        {{-- tipo localidade --}}
        <div class="col-lg-4">
            <label for="tipo_localidade" class="d-block fw-bold">
                Tipo de localidade
            </label>
            <select id="tipo_localidade" name="tipo_localidade_id" class="form-select" aria-label="Default select example">
                <option selected value="">Selecione o responsável da localidade</option>
                @foreach ($tipolocalidades as $tipo_localidade)
                <option value="{{$tipo_localidade->id}}">{{$tipo_localidade->titulo}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="car-footer">
    <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="{{ ($type == 'edit') ? "Editar" : "Salvar" }} usuário">
        <span class="d-xs-block d-lg-none">
            <i class="bi {{ ($type == 'edit') ? "bi-pencil-square" : "bi-save" }}"></i>
        </span>                    
        <span class="d-none d-lg-block">
            <i class="bi {{ ($type == 'edit') ? "bi-pencil-square" : "bi-save" }} me-1"></i>
            {{ ($type == 'edit') ? "Editar" : "Salvar" }} usuário
        </span>                   
    </button>
</div>
@if(!is_null($type))
    </form>
@endif

@section('js')
    <script type="text/javascript">
        $("#cep").focusout(function() {
            //Início do Comando AJAX
            $.ajax({
                //O campo URL diz o caminho de onde virá os dados
                //É importante concatenar o valor digitado no CEP
                url: 'http://viacep.com.br/ws/' + $(this).val() + '/json/',
                //Aqui você deve preencher o tipo de dados que será lido,
                //no caso, estamos lendo JSON.
                dataType: 'json',
                //SUCESS é referente a função que será executada caso
                //ele consiga ler a fonte de dados com sucesso.
                //O parâmetro dentro da função se refere ao nome da variável
                //que você vai dar para ler esse objeto.
                success: function(resposta) {
                    //Agora basta definir os valores que você deseja preencher
                    //automaticamente nos campos acima.
                    $("#logradouro").val(resposta.logradouro);
                    $("#complemento").val(resposta.complemento);
                    $("#bairro").val(resposta.bairro);
                    $("#cidade").val(resposta.localidade);
                    $("#uf").val(resposta.uf);
                    //Vamos incluir para que o Número seja focado automaticamente
                    //melhorando a experiência do usuário
                    $("#numero").focus();
                }
            });
        });
    </script>
@endsection
