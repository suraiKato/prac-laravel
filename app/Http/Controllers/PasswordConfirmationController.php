<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Session\Store;

class PasswordConfirmationController extends Controller
{
    public function show() 
    {
        return view('user.profile.confirm-password');
    }

    // public function store(Request $request) 
    // {
    //     if(! Hash::check($request->password, $request->user()->password)) {
    //         return back()->withErrors([
    //             'password' => 'Пароль не совпадает'
    //         ]);
    //     }

    //     $request->session()->passwordConfirmed();

    //     return redirect()->intended('user/profile');

    // }

    // public function store(Request $request) 
    // {
    //     if (! Hash::check($request->password, $request->user()->password)) 
    //     {
    //         return back()->withErrors([
    //             'password' => "Пароль не совпадает"
    //         ]);
    //     }

    //     $request->session()->passwordConfirmed();

    //     return redirect()->intended('user/profile');
    // }

    public function store(Request $request)
    {
        if(!Hash::check($request->password, $request->user()->password))
        {
            return back()->withErrors(['password' => 'Пароли не совпадают']);
        }

        $request->session()->passwordConfirmed();

        return redirect()->intended('user/profile');
    }
}
