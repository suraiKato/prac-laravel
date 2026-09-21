<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    // public function index(Request $request) 
    // {
    //     return view('forgot.reset', ['request' => $request]);
    // }

    // public function store(Request $request) 
    // {
    //     $request->validate([
    //         'token' => ['required'],
    //         'email' => ['required', 'string', 'email'],
    //         'password' => ['required', 'confirmed', 'min:6'],
    //     ]);

    //     $status = Password::reset(
    //         $request->only('email', 'password', 'password_confirmation', 'token'),
    //         function ($user) use ($request) {
    //             $user->forceFill([
    //                 'password' => bcrypt($request->password),
    //                 'remember_token' => Str::random(60),
    //             ])->save();
    //         }
    //     );

    //     if($status === Password::PASSWORD_RESET) {
    //         return redirect()->route('login')->with('status', trans($status));
    //     }

    //     return back()->withInput($request->only('email'))
    //                     ->withErrors(['email' => trans($status)]);


    // }

    public function index(Request $request)
    {
        return view('forgot.reset', compact('request'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request)
            {
                $user->forcefill([
                    'password' => bcrypt($request->password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        if($status === Password::PASSWORD_RESET)
        {
            return redirect()->route('login')->with('status', trans($status));
        }

        return back()->withInput($request->only('email'))
                ->withErrors(['email' => trans($status)]);
    }
}
