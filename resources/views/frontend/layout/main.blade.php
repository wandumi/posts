<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users App</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}"></script>
    </head>
    <body class="font-sans bg-gray-300">
        <nav class="border-b border-gray-100 text-black bg-white">
            <div class="container mx-auto flex items-center justify-between px-4 py-6">
                <ul class="flex items-center">
                    <li class="ml-16">
                        <a href="{{ route('home') }}" class="w-32">Logo</a>
                    </li>
                   
                    
                    <li class="ml-6">
                        <a href="{{ route('posts.index') }}" class="hover:text-gray-500">Posts</a>
                    </li>
                </ul>
                {{-- <div class="flex items-center">
                    <div class="relative">
                        <input type="text" name="search" id="" class="bg-gray-200 rounded-sm w-64 px-4 py-1">
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
                                <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}</a>

                                <form action="{{ route('logout') }}" method="post" class="p-3 inline disabled">
                                    @csrf
                                    <button type="submit">{{ __('logout') }}</button>
                                </form>
                            </li>
                        
                    </ul>
                @endauth
            </div>
        </nav>
        @yield('content')
    </body>
    
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</html>
