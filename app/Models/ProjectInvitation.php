<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\User;

class ProjectInvitation extends Model
{
    protected $fillable = [
        'project_id', 'invited_by',
        'email', 'token',
        'expires_at', 'accepted_at', 'declines_at',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function inviter() 
    {
        return $this->belongsTo(User::class, 'invited_by');
    }
}
