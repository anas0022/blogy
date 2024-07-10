<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\user;
use  App\models\comment;
use  App\models\Blog;
use Auth;

class UserController extends Controller
{
    public function register() {
        return view('register');
    }

    public function register_post(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:registrations,email', 
            'password' => 'required', 
        ]);

        $User = new User();
        $User ->name = $request->input('name');
        $User ->email = $request->input('email');
        $User ->password = bcrypt($request->input('password')); 
        if (   $User ->save()) {
            return redirect()->route('login')->with('success', 'Registration successful!');
        } else {
            return redirect()->back()->with('error', 'Registration failed. Please try again.');
        }
    }
    public function login(){
      return view('login'); 
    }
    public function loginpost(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard() {
        $user = Auth::user(); 
        $allComments = Comment::all(); 
        $blogs = Blog::all();
        return view('dashbord', compact('user','allComments','blogs'));
    }
   
    
}
