@props(['required' => false])

<label {{ $attributes->class([
    ($required ? 'required' : ''),
    'mb-2',
]) }}>
    {{ $slot }}
</label>