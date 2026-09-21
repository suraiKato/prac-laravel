{{-- @props(['value' => '']) --}}

<input {{ $attributes->class([
    'outline-0', 'border-1', 'border-black/30', 'rounded-lg', 'py-1', 'px-2'
])->merge([
    'type' => 'text',
    // 'value' => (old($attributes->get('name')) ?: $value),
]) }}>