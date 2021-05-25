<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Post_upload;
use App\Mail\PostSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;
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
    public function show(Post $post)
    {
        $image = Image::make('social.jpg')->resize(1200, 630);

        // $user = Auth::user()->name;
        $user = 'sichali';

        $image->text('Growmytree Certificate', 480, 70, function($font){
            $font->file(base_path('public/fonts/Roboto-Bold.ttf'));
            $font->size(24);
            $font->color('#fff');
            $font->valign('center');
           
        });

        $image->text($user, 580, 110, function($font){
            $font->file(base_path('public/fonts/Roboto-Light.ttf'));
            $font->size(18);
            $font->color('#fff');
            $font->valign('center');
           
        });

        // Left side of the page
        $image->text('Carbon Emmision', 330, 280, function($font){
            $font->file(base_path('public/fonts/Roboto-Bold.ttf'));
            $font->size(18);
            $font->color('#fff');
            $font->valign('left');
           
        });

        $treeCarbon = 20 * 50;

        $image->text($treeCarbon, 390, 320, function($font){
            $font->file(base_path('public/fonts/Roboto-Light.ttf'));
            $font->size(18);
            $font->color('#fff');
            $font->valign('left');
           
        });


        // The right side of the page
        $image->text('Tree Planted', 750, 280, function($font){
            $font->file(base_path('public/fonts/Roboto-Bold.ttf'));
            $font->size(18);
            $font->color('#fff');
            $font->valign('left');
           
        });

        $treePlanted = 150 * 50;

        $image->text($treePlanted, 790, 320, function($font){
            $font->file(base_path('public/fonts/Roboto-Light.ttf'));
            $font->size(18);
            $font->color('#fff');
            $font->valign('left');
           
        });

        $username = $user ."_".$image->basename; 
        
        $image->save($username);

        //grab a post
        //grab an image
        //redirect to the view
        //share the view
        return view('frontend.posts.show', compact('post') );

        // if($image)
        // {
        //     $certificate = new Post_upload;
        //     $certificate->user_id = Auth::user()->id;
        //     $certificate->file_name = $username;
        //     $certificate->save();

        //     $savedImage = Post_upload::where('user_id', Auth::user()->id)->first();
           
        //     // Fetch the image
        //     $image = asset($savedImage->file_name);
            

        //     // return $image->response('jpg');
        //     return view('frontend.posts.show', compact('post', 'image') );
        // }

        // return $image->response('jpg');
        // return view('frontend.posts.show', compact('post') );

        
       
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
}
