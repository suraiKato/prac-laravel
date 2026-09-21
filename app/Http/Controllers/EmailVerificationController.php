<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    // public function __invoke(Request $request)
    // {
    //     return $request->user()->hasVerifiedEmail() 
    //         ? redirect()->intended('user/dashboard')
    //         : view('register.verify-email');
    // }

    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                ? redirect()->intended('user/dashboard')
                : view('register.verify-email');
    }
}
