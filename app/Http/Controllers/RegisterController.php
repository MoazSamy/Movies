<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //Returns view "create" that loads the register form.
    public function create()
    {
        return view ('register.create');
    }

    //Validates then stores the to-be user. (isAdmin column defaults to false)
    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:255|unique:users,username',
            'email'=> 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:32',
        ]);

        $user = User::create($attributes);

        //login the user
        Auth::login($user);

        return redirect('/')->with("success", "Your account has been created.");
    }
}
