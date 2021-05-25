@extends('frontend.layout.main')

@section('header') 



<?php 

    $currentUrl = url()->current(); 
    

?>

{{-- <meta property="og:url"     content="http://www.nytimes.com/2015/02/19/arts/international/when-great-minds-dont-think-alike.html" />
<meta property="og:type"         content="article" /> --}}
<meta property="og:title"        content="{{ $post->title }}" />
<meta property="og:description"  content="How much does culture influence creative thinking?" /> 
<meta property="og:image"        content="https://370820b9a0f5.ngrok.io/sichali_social.jpg" />

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
                            
                            <p>
                                <img src='{{ asset('sichali_social.jpg') }}' >
                            </p>
                            
                            <p class="py-3" >
                                {{-- <?php echo $currentUrl ?> --}}
                                <?php echo '<iframe src="https://www.facebook.com/plugins/share_button.php?href='.$currentUrl.'&layout=button_count&size=small&appId=287125813077687&width=96&height=20" 
                                width="96" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>' ?>
                            </p>

                                
                            
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
                            
                        
                        
                </div>

                
        </div>
    </div> --}}

@endsection
