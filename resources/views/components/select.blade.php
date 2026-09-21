@props(['options' => [], 'value' => null])

<select {{ $attributes->class([
    'form-control'
]) }}>

    @foreach ($options as $key => $_value)
        <option value="{{ $key }}" {{ ($key == $value) ? 'selected' : '' }}>
            {{ $_value }}
        </option>
    @endforeach

</select>