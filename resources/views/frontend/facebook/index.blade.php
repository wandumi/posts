@extends('frontend.layout.main')

@section('content')
    <div class="flex justify-center ">
        <div class="p-6 m-5 bg-white rounded-sm sm:w-2/6">
            @guest
                <div class="flex">
                    Please login to create posts
                </div>
            @endguest
            @auth
                @if (session('success'))
                    <div class="p-3 mb-6 text-center text-white bg-green-500 rounded-md">
                        {{ session('success' )}}
                    </div>
                @endif
                <form action="{{ route('posts.store') }}" method="post" class="mb-6">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="sr-only">Title</label>
                        <input type="text" name="title" id="title" placeholder="Post Title" 
                        class="bg-gray-100 border-2 w-full p-3 rounded-md @error('title') border-red-500 @enderror" 
                        value="{{ old('title') }}">
                        @error('title')
                            <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="body" class="sr-only"></label>
                        <textarea name="body" id="body" cols="30" rows="4" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-md @error('body') border-red-500 @enderror"
                        placeholder="Post something..." ></textarea>
                        @error('body')
                            <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <button class="w-full px-3 py-2 font-medium text-white bg-green-600 rounded">Post</button>
                    </div>
                </form>
                @endauth

                <div>
                    @if ($posts->count() )
                        @foreach ($posts as $post)
                            <div class="px-4 py-2 mb-3 bg-gray-200 rounded-sm">
                                
                                <div>
                                    <h3 class="font-semibold text-black">{{ $post->title }}</h3>
                                    <p class="mb-2">
                                        {{ $post->body }}
                                    </p>
                                </div>
                                <div>
                                    <a href="#" class="text-sm"><span class="font-semibold">Posted by: </span>  {{ $post->user->name }}</a>
                                    <span class="text-sm text-gray-600">({{ $post->created_at->diffForHumans() }})</span>
                                </div>

                            
                                <div class="panel-body">
                                    @if($token)
                                        <a class="btn btn-primary" href="/sendfb">
                                            Post to Facebook
                                        </a>
                                    
                                    @else 
                                        <a class="btn btn-primary" href="/login/facebook">
                                            Facebook Login
                                        </a>
                                    @endif
                                </div>
                                
                            </div>
                        @endforeach
                        <div class="flex">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <p>There are no posts.</p>
                    @endif
                </div>
        </div>
    </div>
@endsection
@section('footer')
    <style>
        #socil-links {
            display: inline-block !important;
        }
    </style>
@endsection