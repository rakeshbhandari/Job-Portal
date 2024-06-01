<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }



    public function store()
    {
        //validate
        $data = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::min(6), 'confirmed'] //password_confirmation
        ]);
        //create user
        $user = User::create($data);

        //sign the user in
        Auth::login($user); 

        //redirect
        return redirect('/jobs');
    }
}
