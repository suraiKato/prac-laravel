<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    // public function __invoke(Request $request)
    // {
    //     if($request->user()->hasVerifiedEmail()) {
    //         return redirect()->intended('user/dashboard');
    //     }

    //     $request->user()->sendEmailVerificationNotification();

    //     return back()->with('status', 'Сообщение было отправлено на ваш email');
    // }

    public function __invoke(Request $request)
    {
        if($request->user()->hasVerifiedEmail())
        {
            return redirect()->intended('user/dashboard');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'Письмо отправлено');
    }
}
