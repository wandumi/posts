@extends('frontend.layout.main')

@section('content')
    <div class="flex justify-center ">
        <div class="w-2/3 bg-white m-5 p-6 rounded-sm">
            @guest
                <div class="flex">
                    Please login to create posts
                </div>
            @endguest
            @auth
                <form action="{{ route('posts.store') }}" method="post" class="mb-6">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="body" class="sr-only"></label>
                        <textarea name="body" id="body" cols="30" rows="4" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-md @error('body') border-red-500 @enderror"
                        placeholder="Post something..." ></textarea>
                        @error('body')
                            <div class="text-red-600 mt-2 text-sm"> {{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <button class="bg-green-600 w-full text-white font-medium py-2 px-3 rounded">Post</button>
                    </div>
                </form>
                @endauth

                <div>
                    @if ($posts->count() )
                        @foreach ($posts as $post)
                            <div class="mb-3">
                                <div>
                                    <a href="#" class="font-bold"> {{ $post->user->name }}</a>
                                    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="mb-2">
                                    {{ $post->body }}
                                </p>

                                <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            </div>
                        @endforeach
                        {{-- <div class="flex">
                            {{ $posts->links() }}

                        </div> --}}
                    @else
                        <p>There are no posts.</p>
                    @endif
                </div>
        </div>
    </div>
@endsection