<div class="border-b border-black/30 p-4">
    <div class="flex justify-between items-center">
        <div>
            {{ $slot }}
        </div>
        @isset($right)
            <div class="text-blue-400">
                {{ $right }}
            </div>  
        @endisset
    </div>
</div>