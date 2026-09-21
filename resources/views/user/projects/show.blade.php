@extends('layouts.main')

@section('page.title', 'МОй Проект')

@section('main.content')
    
    <x-title>
        {{ $project->title }}

        <x-slot name="right">
            <div class="flex items-center gap-6">
                <x-button-link href="{{ route('user.projects') }}">
                    {{ __('Назад') }}
                </x-button-link>
                <x-button-link href="{{ route('user.projects.task.create', $project->id) }}">
                    {{ __('Добавить задачу') }}
                </x-button-link>
                <form action="{{ route('user.projects.delete', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="bg-blue-400 py-1 px-4 rounded-lg text-white cursor-pointer transition-colors duration-300 hover:bg-blue-500" type="submit">Удалить проект</button>
                </form>
                <x-button-link href="{{ route('user.projects.edit', $project->id) }}">
                    {{ __('Изменить проект') }}
                </x-button-link>
                <x-button-link href="{{ route('user.projects.invitations', $project->id) }}">
                    {{ __('Пригласить участника') }}
                </x-button-link>
            </div>
        </x-slot>
    </x-title>

    <div>
        <p class="text-lg text-black/50">Описание проекта: {{ $project->description }}</p>
        {{-- @if ($project->tasks->isEmpty())
            <p>Добавьте задачи для вашего проекта</p>
        @else
            <ul>
                @foreach ($project->tasks as $task)
                    <li>{{ $task->title }} <form action="{{ route('user.projects.task.delete', [
                        'project' => $project->id,
                        'task' => $task->id,
                    ])  }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">удалить</button>
                    </form></li>
                @endforeach
            </ul>
        @endif --}}


        @if ($project->tasks->isEmpty())

            <p class="mt-4 text-lg">Добавьте задачи для вашего проекта</p>

        @else
            <p class="mt-4 text-lg">Задачи:</p>
            <ul>
                @foreach ($project->tasks as $task)
                    <li class="flex items-center gap-4 mt-4">
                        {{ $task->title }}
                        <form action="{{ route('user.projects.task.delete', [
                        
                            'project' => $project->id,
                            'task' => $task->id,
                        
                        ]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="bg-blue-400 py-1 px-4 rounded-lg text-white cursor-pointer transition-colors duration-300 hover:bg-blue-500" type="submit" value="Удалить">
                        </form>
                        <a class="bg-blue-400 py-1 px-4 rounded-lg text-white cursor-pointer transition-colors duration-300 hover:bg-blue-500" href="{{ route('user.projects.task.edit', [
                        
                            'project' => $project->id,
                            'task' => $task->id,
                        
                        ]) }}">Редактировать</a>
                    </li>
                @endforeach
            </ul>
            
        @endif
        
    </div>

@endsection