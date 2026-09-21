<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProjectInvitationMail;

class ProjectInvitationController extends Controller
{
    // public function index($project)
    // {
    //     return view('user.projects.invite', compact('project'));
    // }

    // public function store(Request $request, Project $project)
    // {
    //     $validated = $request->validate([
    //         'email' => ['required', 'email'],
    //     ]);

    //     $invitation = ProjectInvitation::create([
    //         'project_id' => $project->id,
    //         'invited_by' => $request->user()->id,
    //         'email' => $validated['email'],
    //         'token' => Str::random(64),
    //         'expires_at' => now()->addDays(7),
    //     ]);

    //     Mail::to($invitation->email)->send(new ProjectInvitationMail($invitation));

    //     return back()->with('success', 'Приглашение отправлено');
    // }

    // public function show(string $token)
    // {
    //     $invitation = ProjectInvitation::where('token', $token)
    //                     ->firstOrFail();
    //     return view('invitations.show', compact('invitation'));
    // }

    // public function accept(Request $request, string $token) 
    // {
    //     $invitation = ProjectInvitation::where('token', $token)
    //                     ->firstOrFail();

    //     $request->user()->projects()->syncWithoutDetaching(
    //         [$invitation->project_id]
    //     );

    //     $invitation->update([
    //         'accepted_at' => now(),
    //     ]);

    //     return redirect()->route('user.projects');
    // }

    // public function decline(string $token) 
    // {
    //     $invitation = ProjectInvitation::where('token', $token)
    //         ->firstOrFail();
        
    //     $invitation->update([
    //         'declined_at' => now(),
    //     ]);

    //     return redirect()->route('user.projects');

    // }

    public function index($project)
    {
        return view('user.projects.invite', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $validated = $request->validate([
            'email' => ['required', 'email']
        ]);

        $invitation = ProjectInvitation::create([
            'project_id' => $project->id,
            'invited_by' => $request->user()->id,
            'email' => $validated['email'],
            'token' => Str::random(64),
            'expires_at' => now()->addDays(7),
        ]);

        Mail::to($invitation->email)->send(new ProjectInvitationMail($invitation));

        return back()->with('success', 'Приглашение отправлено');
    }

    public function show(string $token)
    {
        $invitation = ProjectInvitation::where('token', $token)->firstOrFail();

        return view('invitations.show', compact('invitation'));
    }

    public function accept(Request $request, string $token)
    {
        $invitation = ProjectInvitation::where('token', $token)->firstOrFail();

        $request->user()->projects()->syncWithoutDetaching([
            $invitation->project_id
        ]);

        $invitation->update([
            'accepted_at' => now(),
        ]);

        return redirect()->route('user.projects');
    }

    public function decline(string $token)
    {
        $invitation = ProjectInvitation::where('token', $token)->firstOrFail();

        $invitation->update([
            'declined_at' => now()        
        ]);

        return redirect()->route('user.projects');
    }
}
