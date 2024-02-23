{{-- <select class="form-select" {{ $attributes->merge(['name' => 'uf', 'id' => 'uf']) }}>

    @foreach (array_keys($uf) as $uf)

        <option value="{{ $uf }}" 
        {{-- @if(isset($type) && $type == 'edit') {{ $isSelected($uf, $value) ? 'selected' : '' }} @endif --}}
        >
            {{ $uf }}
        </option>

    @endforeach

</select> --}}