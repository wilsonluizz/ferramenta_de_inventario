<label for="{{ $identificador }}" class="d-block fw-bold">
    {{ $label }}
</label>

{{-- CREATE/EDIT --}}
@if($metodo != 'show')

    <input type="text" name="{{ $nome }}" class="form-control" id="{{ $identificador }}" aria-describedby="dica-{{ $identificador }}" @if($metodo == 'edit') value="{{ $objeto->$identificador }}" @endif />
    <small id="dica-{{ $identificador }}" class="form-text text-muted">
        {{ $dica }}
    </small>

{{-- SHOW --}}
@else
    {{ $objeto->$identificador }}
@endif