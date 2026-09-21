<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index(Request $request) {

        $usersCount = User::count();

        $user = $request->user();
        $projectsCount = $user->projects()->count();

        return view('dashboard.index', compact('usersCount', 'projectsCount'));
    }
}
