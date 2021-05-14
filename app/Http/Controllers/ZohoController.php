<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use zcrmsdk\oauth\ZohoOAuth;
use Illuminate\Support\Facades\Storage;
use zcrmsdk\crm\setup\restclient\ZCRMRestClient;


class ZohoController extends Controller
{
    
    public function __invoke()
    {
        $path = asset('zoho');
        // zoho credentials
        $configuration = array(
            'client_id' => '1000.ZLJ1A005CBQ64GLW7ZSKT1DA3NQM4S',
            'client_secret' => '1619a6fa7316e389b9faa1335bf3c3beb4e9fdbedb',
            'redirect_uri' => 'http://localhost:8000',
            'currentUserEmail' => 'munandih@gmail.com',
            'token_persistence_path' => "/zoho",
        );

        try {
            // initialize the client
            ZCRMRestClient::initialize($configuration);
            $oAuthClient = ZohoOAuth::getClientInstance();
            $grantToken = "1000.1294231a41abbcf24c93efeb6ab337fb.cf09adb0629ee15f7fd2a2f92756547a";
            $tokens = $oAuthClient->generateAccessToken($grantToken);
            
            
            $result = 'success';

        } catch (\Exception $e) {
            //throw $th;
            $result = $e->getMessage();
        }

        return view('frontend.zoho.zoho_oauth', [
            'result' => $result
        ]);
    }


}
