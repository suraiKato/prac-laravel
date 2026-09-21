<h1>Вас пригласили в проект</h1>

<p>
    Пользователь {{ $invitation->inviter->name }}
    пригласил вас в проект
    {{ $invitation->project->title }}.
</p>

<a href="{{ route('invitations.show', $invitation->token) }}">
    Посмотреть приглашение
</a>