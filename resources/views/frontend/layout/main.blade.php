<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users App</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
        @section('header') @endsection
    </head>
    <body class="font-sans bg-gray-300">
        <nav class="text-black bg-white border-b border-gray-100">
            <div class="container flex flex-wrap items-center justify-between px-4 py-6 mx-auto lg:flex-nowrap">
                <ul class="flex items-center">
                    <li class="ml-16">
                        <a href="{{ route('home') }}" class="w-32">Logo</a>
                    </li>
                   
                    
                    <li class="ml-6">
                        <a href="{{ route('posts.index') }}" class="hover:text-gray-500">Posts</a>
                    </li>

                    <li class="ml-6">
                        <a href="{{ route('facebook') }}" class="hover:text-gray-500">facebook</a>
                    </li>

                    <li class="ml-8">
                        <a href="{{ route('certificates') }}" class="w-32">certificates</a>
                    </li>
                    
                </ul>
                {{-- <div class="flex items-center">
                    <div class="relative">
                        <input type="text" name="search" id="" class="w-64 px-4 py-1 bg-gray-200 rounded-sm">
                    </div>
                </div> --}}
                @guest
                    <ul class="flex mr-16">
                        
                        <li class="ml-10">
                            <a href="{{ route('login') }}" class="hover:text-gray-500">Login</a>
                        </li>
                        <li class="ml-6">
                            <a href="{{ route('register') }}" class="hover:text-gray-500">Register</a>
                        </li>
                    </ul>
                @endguest
                @auth
                    <ul class="flex mr-16">
                        
                            <li class="ml-10">
                                <a href="#" class="hover:text-gray-500"> {{ auth()->user()->name }} </a>
                            </li>
                            <li class="ml-6">
                               

                                <form action="{{ route('logout') }}" method="post" class="inline p-3">
                                    @csrf
                                    <button type="submit">logout</button>
                                </form>
                            </li>
                        
                    </ul>
                @endauth
            </div>
        </nav>
        @yield('content')
    </body>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    @section('footer')
        
    @endsection
</html>
