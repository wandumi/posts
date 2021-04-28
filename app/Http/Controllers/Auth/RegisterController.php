<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate the user 
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|confirmed'
        ]);

        // Save the user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // Authenticating the user
        Auth::attempt($request->only('email', 'password'));
            
        // log in the user
        return redirect()->intended('dashboard');
    
    }
}
   