<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    //Logs the user out.
    public function destroy(){
        Auth::logout();

        return redirect('/')->with('success' , 'Goodbye!');
    }

    //Validates the user to sign in , then authenticates the user logging them back in.
    public function store(){
        //validation
        $credentials=request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        //authentication
        if(Auth::attempt($credentials)){
            //avoid session fixation
            session()->regenerate();
            return redirect('/')->with('success' , 'Welcome back!');
        }
        return back()
        ->withInput()
        ->withErrors(['email'=>'Your provided credentials couldn\'t be authenticated.']);
    }
    
    //Returns view "login" that displays the login form
    public function create(){
        return view('login');
    }
}
