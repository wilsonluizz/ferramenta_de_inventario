<form action="{{ route('notas-fiscais.store') }}" method="POST" enctype="multipart/form-data">
@csrf

    <div class="row">

        <div class="col-12 my-2">
            <label for="numero" class="form-label">Número</label>
            <input type="text" name="numero" class="form-control" placeholder="Digite o número" value="{{ old('numero') }}" required>
        </div>

        <div class="col-12 my-2">
            <label for="numero" class="form-label">Valor</label>
            <input type="text" name="valor" class="form-control" placeholder="Digite o valor" value="{{ old('valor') }}" required>
        </div>

        <div class="col-12 my-2">
            <label for="numero" class="form-label">SC. origem</label>
            <input type="text" name="sc_origem" class="form-control" placeholder="SC origem" value="{{ old('sc_origem') }}">
        </div>

        <div class="col-12 my-2">
            <label for="numero" class="form-label">Data de emissão</label>
            <input type="date" name="data_emissao" class="form-control" placeholder="Data de emissão" value="{{ old('data_emissao') }}" required>
        </div>

        <div class="col-12 my-2">
            <label for="arquivo" class="form-label">Arquivo (opcional)</label>
            <input type="file" name="arquivo" class="form-control" placeholder="Anexar arquivo (opcional)">
        </div>

        <div class="col-12 my-2 text-end">
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

{{-- @section('js') --}}
    {{-- <script src="https://unpkg.com/imask"></script> --}}

    {{-- <script>
        var numberMask = IMask(
            document.getElementById('valor'),
            {
                mask: Number,
                thousandsSeparator: '.'
            });
    </script> --}}
{{-- @endsection --}}