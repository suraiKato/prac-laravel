@props(['size' => ''])

<button {{ $attributes->class([
    'bg-blue-400 py-1 px-4 rounded-lg text-white cursor-pointer transition-colors duration-300 hover:bg-blue-500', ($size ? "btn-{$size}" : '')
])->merge([
    'type' => 'button',
]) }}>
    {{ $slot }}
</button>