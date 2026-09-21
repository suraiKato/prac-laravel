<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // public function index() 
    // {
    //     return view('register.index');
    // }

    // public function store(Request $request) 
    // {
    //     $request->validate([
    //         'name' => ['required'],
    //         'email' => ['required', 'string', 'email', 'unique:users'],
    //         'password' => ['required', 'confirmed', 'min:6'],
    //         'agreement' => ['required'],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password),
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect('user/dashboard');


    // }

    public function index() 
    {
        return view('register.index');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:6'],
            'agreement' => ['required']
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('user.dashboard');
    }
}
