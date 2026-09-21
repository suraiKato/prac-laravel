<h1>Приглашение в проект</h1>
<p>
    Вас пригласили в проект:
    {{ $invitation->project->name }}
</p>

<x-form action="{{ route('invitations.accept', $invitation->token) }}" method="POST">
    <x-button type="submit">
        {{ __('Принять') }}
    </x-button>
</x-form>

<x-form action="{{ route('invitations.decline', $invitation->token) }}" method="POST">
    <x-button type="submit">
        {{ __('Отклонить') }}
    </x-button>
</x-form>