<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }


    public function store()
    {
        //validate
        $data = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        //attempt to authenticate the user
        if (!Auth::attempt($data)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, these credentials do not match our records.'
            ]);
        }

        //regenerate the session token
        request()->session()->regenerate();

        //redirect
        return redirect('/jobs');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
