<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Users Dashboard</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans bg-gray-300">
        <nav class="text-black bg-white border-b border-gray-100">
            <div class="container flex items-center justify-between px-4 py-6 mx-auto">
                <ul class="flex items-center">
                    <li class="ml-16">
                        <a href="{{ route('home') }}" class="w-32">Logo</a>
                    </li>

                    <li class="ml-8">
                        <a href="{{ route('posts.index') }}" class="w-32">Posts</a>
                    </li>

                    <li class="ml-8">
                        {{-- <a href="{{ route('certificates.index') }}" class="w-32">certificates</a> --}}
                    </li>
                    
                </ul>
                <div class="flex items-center">
                    <div class="relative">
                        <input type="text" name="search" id="" class="w-64 px-4 py-1 bg-gray-200 rounded-sm">
                    </div>
                </div>
                {{-- Check the if the user is loggged in --}}
                <ul class="flex mr-16">
                    @auth
                        <li class="ml-10">
                            <a href="#" class="hover:text-gray-500"> {{ auth()->user()->name }} </a>
                        </li>
                        <li class="ml-6">
                        

                            <form action="{{ route('logout') }}" method="post" class="inline p-3">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
        @yield('content')
    </body>
</html>
