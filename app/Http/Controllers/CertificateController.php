<?php

namespace App\Http\Controllers;

use App\Post_upload;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class CertificateController extends Controller
{
    public function index()
    {
        return view('frontend.certificates.index');
    }

    public function store(Request $request)
   {
        //dd($request->all());
        $name       = $request->name;
        $second     = $request->second;
        $third      = $request->third;
        $forth      = $request->forth;
        $firth      = $request->firth;
        $sixth      = $request->sixth;
        $seventh    = $request->seventh;
        $eigth      = $request->eigth;
        $nigth      = $request->nigth;

        $image = Image::make('giftcard.jpg')->fit(1800, 1800);

        $image->text($name, 780, 200, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(46);
            $font->color('#fff');
            $font->valign('center');
            
        });

        $image->text('CLIMATE HERO!', 750, 300, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(46);
            $font->color('#fff');
            $font->valign('center');
        });

        $image->text($second, 760, 500, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(46);
            $font->color('#fff');
            $font->valign('center');
            
        });
        // dd($third);
        $image->text($third, 750, 580, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(46);
            $font->color('#fff');
            $font->valign('center');
            
        });

        $image->text('22 Baume', 740, 800, function($font){
            $font->file(base_path('public/fonts/Caveat-Regular.ttf'));
            $font->size(125);
            $font->color('#fff');
            $font->valign('center');
            
        });

        // Three sections of text
        $image->text('~484kg', 330, 1000, function($font){
            $font->file(base_path('public/fonts/Caveat-Regular.ttf'));
            $font->size(125);
            $font->color('#fff');
            $font->valign('left');
        });

        $image->text('=', 900, 1000, function($font){
            $font->file(base_path('public/fonts/Caveat-Regular.ttf'));
            $font->size(125);
            $font->color('#fff');
            $font->valign('center');
        });

        $image->text('~5%', 1250, 1000, function($font){
            $font->file(base_path('public/fonts/Caveat-Regular.ttf'));
            $font->size(125);
            $font->color('#fff');
            $font->valign('right');
        });

        // Two sections/ first column 
        $image->text('CO2 konnten', 420, 1150, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });
        $image->text('neutralistert', 430, 1200, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });
        $image->text('werden', 460, 1250, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });

        // Two sections/ second column 
        $image->text('meines CO2', 1300, 1150, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });
        $image->text('AusstoBes auf', 1280, 1200, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });
        $image->text('Lebenszeit', 1320, 1250, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(37);
            $font->color('#fff');
            $font->valign('center');
        });



        $user = Auth::user()->name;

        $username = $name ."_".$image->basename; 
    
        // return $image->response('jpg');

        $savedImage = Post_upload::where('file_name', $name."_giftcard.jpg")->first();
        // dd($savedImage);

        if(!$savedImage)
        {
            $certificate = new Post_upload;
            $certificate->user_id = Auth::user()->id;
            $certificate->file_name = $username;
            $certificate->save();

            $image->save($username);
            
        }
        
        return view('frontend.posts.show', compact('savedImage') );

   }
}
