@extends('frontend.layout.main')

@section('content')
    <div class="flex items-center justify-center h-full m-20 mx-auto">
        <div class="p-6 m-5 mt-10 bg-white rounded-md lg:w-2/6 ">
            @if (session('status'))
                <div class="p-3 mb-6 text-center text-white bg-red-600 rounded-md">
                    {{ session('status' )}}
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                
               
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email address" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('email') border-red-500 @enderror"
                    autocomplete="hello"  
                    value="{{ old('email') }}">
                    @error('email')
                        <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Email</label>
                    <input type="password" name="password" id="password" placeholder="Your Password" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('password') border-red @enderror" 
                    autocomplete="hello" >
                    @error('password')
                        <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
               
                <div>
                    <button type="submit" class="w-full px-3 py-2 font-medium text-white bg-green-700 rounded-md">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection