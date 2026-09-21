<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Task;
use App\Models\ProjectInvitation;

class Project extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

    public function users() 
    {
        return $this->belongsToMany(User::class);
    }

    public function tasks() 
    {
        return $this->hasMany(Task::class);
    }

    public function invitations() 
    {
        return $this->hasMany(ProjectInvitation::class);
    }
}
