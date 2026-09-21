<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;

use function Laravel\Prompts\title;

class TaskController extends Controller
{
    // public function create(Request $request, $project) 
    // {
    //     return view('user.projects.tasks.create', compact('project'));
    // }

    // public function store(Request $request, $project) 
    // {
    //     $validated = $request->validate([
    //         'title' => ['required', 'string', 'max:100'],
    //     ]);

    //     $task = Task::firstOrCreate([
    //         'project_id' => $project,
    //         'title' => $validated['title'],
    //     ]);

    //      $project->tasks()->create([
    //          'title' => $validated['title'],
    //      ]);

    //     return redirect()->route('user.projects.show', $project);
    // }

    // public function delete(Project $project, Task $task) 
    // {
    //     $task->delete();

    //     return back();
    // }

    public function create(Request $request, $project) 
    {
        return view('user.projects.tasks.create', compact('project'));
    }

    public function store(Request $request, Project $project) 
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
        ]);

        $project->tasks()->create([
            'title' => $validated['title'],
        ]);

        return redirect()->route('user.projects.show', $project);
    }

    public function edit(Project $project, $task)
    {
        $task = Task::findOrFail($task);

        return view('user.projects.tasks.edit', compact(['project', 'task']));
    }

    public function update(Request $request, Project $project, $task) 
    {
        $task = Task::findOrFail($task);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
        ]);

        $task->update($validated);

        return redirect()->route('user.projects.show', $project);
    }

    public function delete(Project $project, Task $task) 
    {
        $task->delete();

        return back();
    }


}
