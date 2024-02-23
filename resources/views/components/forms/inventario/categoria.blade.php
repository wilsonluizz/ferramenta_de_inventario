{{-- FORMULÁRIO DE REGISTRO DE CATEGORIAS NO APP DE INVENTÁRIO --}}


<form action="{{ ($metodo == 'edit') ? route('categoria.update', $instancia) : route('categoria.store') }}" method="post">
    @if($metodo == 'edit') @method('PUT') @endif
    @csrf

    <div class="row p-2">
        <div class="col">
            <label for="categoria" class="d-block">Nome da categoria</label>
            <input type="text" class="form-control" name="categoria" @if($metodo == "edit") value="{{ $ct->categoria }}" @endif>
        </div>
    </div>

    <div class="row p-2">
        <div class="col">
            <x-forms.selects.contabil-conta-select :metodo="$metodo" :contabilContaId="$contabilContaId" />
        </div>
    </div>

    <div class="row p-2">
        <div class="col-6 mt-2"></div>

        <div class="col-6 text-end">
            <button type="submit" class="btn btn-primary" data-toggle="tooltip" title="{{ ($metodo == 'edit') ? "Editar" : "Salvar" }}">
                <span class="d-xs-block d-lg-none">
                    <i class="bi {{ ($metodo == 'edit') ? "bi-pencil-square" : "bi-save" }}"></i>
                </span>                    
                <span class="d-none d-lg-block">
                    <i class="bi {{ ($metodo == 'edit') ? "bi-pencil-square" : "bi-save" }} me-1"></i>
                    {{ ($metodo == 'edit') ? "Editar" : "Salvar" }}
                </span>                   
            </button>
        </div>
    </div>

</form>