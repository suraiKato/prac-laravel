<div class="border-b border-black/30 pb-6 mb-8">
    @isset($link)
        <div class="mb-2">
            {{ $link }}
        </div>
    @endisset

    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-semibold m-0">
                {{ $slot }}
            </h1>
        </div>

        @isset($right)
            <div>
                {{ $right }}
            </div>
        @endisset
    </div>
</div>

<x-errors/>

