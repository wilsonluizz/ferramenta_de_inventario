{{-- FORMULÁRIO DE REGISTRO DE MARCAS NO APP DE INVENTÁRIO --}}

<form action="{{ ($metodo == 'edit') ? route('marca.update', $instancia) : route('marca.store') }}" method="post">
    @if($metodo == 'edit') @method('PUT') @endif
    @csrf

    <div class="row p-2">
        <div class="col">
            <label for="marca" class="d-block">Nome da marca</label>
            <input type="text" class="form-control" name="marca" placeholder="Nome da marca" @if($metodo == "edit") value="{{ $mm->marca }}" @endif>
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