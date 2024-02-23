<label for="{{ $identificador }}" class="d-block fw-bold">
    {{ $label }}
</label>

{{-- CREATE/EDIT --}}
@if($metodo != 'show')

    <select class="form-select" name="{{ $identificador }}" id="{{ $identificador }}">
        @if($metodo == 'create') <option class="text-muted" selected disabled>Selecione uma opção na lista</option> @endif
        @foreach($objeto as $o)
        <option value="{{ $o->id }}" {{  ($selected == $o->id ? 'selected' : '') }}>
            {{ $o->titulo }}
        </option>
        @endforeach
    </select>

    <small id="dica-{{ $identificador }}" class="form-text text-muted">
        {{ $dica }}
    </small>

@endif
