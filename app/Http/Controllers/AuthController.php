<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function attempting(Request $request) {
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credential)) {
            return redirect('/');
        } else {
            dd('unauthenticated');
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect('/login');
    }
}
