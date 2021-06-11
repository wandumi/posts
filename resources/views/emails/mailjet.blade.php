<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<P> {{ $post->title }} </P>

<p> {{ $post->body }}</p>

<p>Created by: {{ $post->user->name }}</p>

<p>Post <a href="{{ route('posts.show',$post->id) }}"> View </a> </p>

<p>share the post 
    {!! Share::page('http://f935faf5403d.ngrok.io/posts', $post->body)->facebook()->twitter()->linkedin() !!}
</p>