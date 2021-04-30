<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    

    // public function __construct()
    // {
    //     $this->middleware('guest')->except('store');
    // }

    public function __invoke()
    {
        Auth::logout();
    
        return redirect()->route('home');

    }
} 
