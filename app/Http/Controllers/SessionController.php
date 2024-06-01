<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

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
        Auth::attempt($data);

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
