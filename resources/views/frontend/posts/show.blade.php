@extends('frontend.layout.main')

@section('header') 



<?php 

    $currentUrl = url()->current(); 
    

?>

{{-- <meta property="og:url"     content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
<meta property="og:type"         content="article" /> --}}
<meta property="og:title"        content="{{ $post->title }}" />
<meta property="og:description"  content="How much does culture influence creative thinking?" /> 
<meta property="og:image"        content="https://8eb335974116.ngrok.io/{{ asset('sichali_social.jpg') }}" />

@endsection
@section('content')
 
    <div class="flex justify-center ">
        <div class="p-6 m-5 bg-white rounded-sm sm:w-1/2">
            
                <div>
                    
                    <div class="px-4 py-2 mb-3 bg-gray-200 rounded-sm">
                        
                        <div>
                            
                            <h3 class="font-semibold text-black">{{ $post->title }}</h3>
                            <p class="mb-2">
                                {{ $post->body }}
                            </p>
                        </div>
                        <div>
                          
                            <p>
                                @if ($savedImage)
                                    <img src='{{ asset($savedImage->file_name) }}'>
                                @endif
                            </p>

                        </div>
                        <div class="pt-4">
                            <a href="{{ route('download')}}" class="px-2 py-1 text-white bg-green-600">Download Certificate</a>
                        </div>
                        <div>
                            <a href="#" class="text-sm"><span class="font-semibold">Posted by: </span>  name </a>
                            <span class="text-sm text-gray-600">({{ $post->created_at->diffForHumans() }})</span>
                        </div>

                    </div>
                            
                        
                        
                </div>

                
        </div>
    </div>
  
  {{-- <div class="flex justify-center ">
        <div class="p-6 m-5 bg-white rounded-sm sm:w-1/2">
            
                <div>
                    
                    <div class="px-4 py-2 mb-3 bg-gray-200 rounded-sm">
                        
                        <div>
                            <p>Please login to access this page</p>
                        </div>

                    </div>
                            
                        {{-- <p class="py-3" >
                            <iframe src="https://www.facebook.com/plugins/share_button.php?href='.$currentUrl.'&layout=button_count&size=small&appId=287125813077687&width=96&height=20" 
                            width="96" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>' ?>
                        </p> 
                        
                </div>

                
        </div>
    </div> --}}

@endsection
