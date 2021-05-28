<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Post_upload;
use App\Mail\PostSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __constructor()
    {
        $this->middleware('auth')->only('store');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $posts = Post::with('user')->latest()->paginate(10);

        // $Share = new Share;

        return view('frontend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the post
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // save the post with the user
        $posted = $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body
        ]);

        Mail::to($request->user())->send(
            new PostSocial($posted)
        );

        return back()->with('success', 'Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Post $post)
    {
       
        $image = Image::make('certificate.jpg')->fit(1800, 1800);

        $image->text('MAX IST EIN!', 780, 200, function($font){
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

        $image->text('Und das haben wir', 760, 500, function($font){
            $font->file(base_path('public/fonts/Helvetica.ttf'));
            $font->size(46);
            $font->color('#fff');
            $font->valign('center');
            
        });

        $image->text('gemeinsam erricht:', 750, 580, function($font){
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

        $username = $user ."_".$image->basename; 

        // $image->header('Content-Type', 'image/jpg');

        // return $image;
       
        return $image->response();

        $savedImage = Post_upload::where('user_id', Auth::user()->id)->first();
        // dd($savedImage);

        if(!$savedImage)
        {
            $certificate = new Post_upload;
            $certificate->user_id = Auth::user()->id;
            $certificate->file_name = $username;
            $certificate->save();

            $image->save($username);
        }


        // return $image->response('jpg');
        return view('frontend.posts.show', compact('post', 'savedImage') );

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

   public function certificate()
   {
       $download = Post_upload::where('user_id', Auth::user()->id)->first();
       $user = Auth::user()->name;
       //dd($user);

       $file = public_path()."\\". $download->file_name;

       $header = array(
           'content-type: application/jpg'
       );

        //dd($file);
       return Response()->download($file, $user."_certificate.jpg", $header);
   }    

   public function download()
   {
      return view('frontend.certificates.download'); 
   }
}
