<label for="contabil_conta_id" class="d-block">Conta contábil</label>

<select name="contabil_conta_id" class="form-select" id="contabil_conta_id" required>

    <option value="" @if($metodo != "edit") selected @endif disabled>Selecione Categoria</option>

    @foreach ($contabilConta as $cc)
        <option value="{{ $cc->id }}" @if($metodo == "edit" && ($cc->id == $contabilContaId)) selected @endif> 
            {{ $cc->codigo_sap }} - {{ $cc->alias }} ({{ $cc->codigo_tasy }})
        </option>
    @endforeach
</select>