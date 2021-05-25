<?php

namespace App\Http\Controllers;

use Facebook\Facebook;
use Illuminate\Http\Request;

class FbookController extends Controller
{
    public function index()
    {
        $connect = new Facebook([
            'client_id' => env('FACEBOOK_CLIENT_ID'),
            'client_secret' => env('FACEBOOK_CLIENT_SECRET')
        ]);
        
        $user = $connect->getUser();
        dd($user);
    }
}
