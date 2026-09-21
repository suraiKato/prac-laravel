<x-card>
    <x-card-body>
        <h4 class="mb-2">
            <a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a>
        </h4>
        <div class="small text-muted">
            {{-- {{ now()->format('d:m:y h:i:s') }} --}}
            {{-- {{ $post->published_at->format('d:m:y h:i:s') }} --}}
            {{ $post->published_at?->diffForHumans() }}
        </div>
    </x-card-body>
</x-card>