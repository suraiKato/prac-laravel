<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    
    protected $fillable = [
        'amount',
    ];

}
