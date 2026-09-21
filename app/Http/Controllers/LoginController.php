<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // public function index() 
    // {
    //     return view('login.index');
    // }

    // public function store(Request $request) 
    // {
    //     $credentials = $request->validate([
    //         'email' => ['required', 'string', 'email'],
    //         'password' => ['required', 'min:6'],
    //     ]);

    //     if(! Auth::attempt($credentials, $request->remember))
    //     {
    //         throw ValidationException::withMessages([
    //             'email' => trans('auth.failed'),
    //         ]);
    //     }

    //     $request->session()->regenerate();

    //     return redirect('user/dashboard');
    // }

    // public function destroy(Request $request) 
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();

    //     $request->session()->regenerateToken();

    //     return redirect('/');
    // }

    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'min:6'],
        ]);

        if(!Auth::attempt($validated, $request->remember))
        {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('user.projects');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
