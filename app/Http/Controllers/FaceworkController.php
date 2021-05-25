<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Facebook\Exceptions\FacebookSDKException;

class FaceworkController extends Controller
{
    private $api;

    /*Redirect the user to the Facebook authentication page.
    *
    * @return \Illuminate\Http\Response
    */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
     
    /**
     * Obtain the user information from Facebook.
     *
     * @return void
     */
     public function handleProviderFacebookCallback()
    {
        $auth_user = Socialite::driver('facebook')->user(); // Fetch authenticated user
        // dd($user); 

        $user = User::where('email', Auth::user()->email)->first();
       
        dd($user);
        
        if($user){
        
            $user->update(
                [
                    'token' => $auth_user->token,
                ]
            );


            // Auth::login($user, true);
            
            return redirect()->to('facebook'); // Redirect to a secure page

        };

        // return redirect()->to('facebook'); // Redirect to a secure page
    }

    

    public function home()
    {

        $posts = Post::with('user')->latest()->paginate(10); 
        $token = User::where('token', Auth::user()->token)->first();
        // dd($token);

        return view('frontend.facebook.index', compact('posts','token'));
    }
   
}
