<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    // public function __invoke(EmailVerificationRequest $request)
    // {
    //     if($request->user()->hasVerifiedEmail()) {
    //         return redirect()->intended('user/dashboard');
    //     }

    //     $request->fulfill();

    //     return redirect()->intended('user/dashboard');
    // }

    public function __invoke(EmailVerificationRequest $request)
    {
        if($request->user()->hasVerifiedEmail())
        {
            return redirect()->intended('user/dashboard');
        }

        $request->fulfill();

        return redirect()->intended('user/dashboard');
    }
}
