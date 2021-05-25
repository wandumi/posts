<?php

namespace App\Http\Controllers;

use Facebook\Facebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Facebook\Exceptions\FacebookSDKException;

class FacebookcrudController extends Controller
{
    private $api;
    
    public function __construct(Facebook $fb)
    {
        $this->middleware(function ($request, $next) use ($fb) {
            $fb->setDefaultAccessToken(Auth::user()->token);
            $this->api = $fb;
            return $next($request);
        });
    }
    
    public function retrieveUserProfile(){

        try {
 
            $params = "first_name,last_name,age_range,gender";
 
            $user = $this->api->get('/me?fields='.$params)->getGraphUser();
 
            dd($user);
 
        } catch (FacebookSDKException $e) {
 
        }
 
    }

    public function publishToProfile(Request $request){
        // dd($request->all());
        try {
            $response = $this->api->post('/me/feed', [
                'message' => $request->message
            ])->getGraphNode()->asArray();
            if($response['id']){
               // post created
            }
        } catch (FacebookSDKException $e) {
            dd($e); // handle exception
        }
    }

    public function publishToProfilePhoto(Request $request){
        $absolute_image_path = '/var/www/larave/storage/app/images/lorde.png';
        try {
            $response = $this->api->post('/me/feed', [
                'message' => $request->message,
                'source'    =>  $this->api->fileToUpload('/path/to/file.jpg')
            ])->getGraphNode()->asArray();
     
            if($response['id']){
               // post created
            }
        } catch (FacebookSDKException $e) {
            dd($e); // handle exception
        }
    }
}
