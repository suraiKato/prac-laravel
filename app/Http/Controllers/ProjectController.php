<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;

class ProjectController extends Controller
{
    // public function index(Request $request) {

    //     $user = $request->user();

    //     $projects = $user->projects;
        
    //     return view('user.projects.index', compact('projects'));
    // }

    // public function create() 
    // {
    //     return view('user.projects.create');
    // }

    // public function store(Request $request) 
    // {
    //     $validated = $request->validate([
    //         'title' => ['required', 'string', 'max:100'],
    //         'description' => ['max:500'],
    //     ]);

    //     $project = Project::firstOrCreate([
    //         'title' => $validated['title'],
    //         'description' => $validated['description'],
    //     ]);

    //     $request->user()->projects()->attach($project);

    //     return redirect('user/projects');

    // }

    // public function show(Request $request, Project $project) 
    // {

    //     return view('user.projects.show', compact('project'));
    // }

    // public function edit($project) 
    // {
    //     $project = Project::findOrFail($project);

    //     return view('user.projects.edit', compact('project'));
    // }

    // public function update(Request $request, $project) 
    // {
    //     $project = Project::findOrFail($project);

    //     $validated = $request->validate([
    //         'title' => ['required', 'string', 'max:100'],
    //         'description' => ['max:500'],
    //     ]);

    //     $project->update($validated);

    //     return redirect()->route('user.projects');
    // }

    // public function delete($project) 
    // {
    //     Project::destroy($project);

    //     return redirect('user/projects');
    // }

    public function index(Request $request)
    {
        $projects = $request->user()->projects;

        return view('user.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('user.projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'description' => ['string', 'max:200'],
        ]);

        $project = Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        $request->user()->projects()->attach($project);

        return redirect()->route('user.projects');
    }

    public function show(Project $project)
    {
        return view('user.projects.show', compact('project'));
    }

    public function edit($project)
    {
        $project = Project::findOrFail($project);

        return view('user.projects.edit', compact('project'));
    }

    public function update(Request $request, $project)
    {
        $project = Project::findOrFail($project);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'description' => ['string', 'max:200'],
        ]);
        
        $project->update($validated);

        return redirect()->route('user.projects');
    }

    public function delete($project)
    {
        $project->delete();

        return redirect()->route('user.projects');
    }

    


}