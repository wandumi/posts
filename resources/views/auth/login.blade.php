@extends('frontend.layout.main')

@section('content')
    <div class="flex justify-center items-center m-20">
        <div class="w-4/12 bg-white m-5 p-6 rounded-md mt-10 ">
            @if (session('status'))
                <div class="bg-red-600 p-3 rounded-md mb-6 text-white text-center">
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
                        <div class="text-red-600 mt-2 text-sm"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Email</label>
                    <input type="password" name="password" id="password" placeholder="Your Password" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('password') border-red @enderror" 
                    autocomplete="hello" >
                    @error('password')
                        <div class="text-red-600 mt-2 text-sm"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>
               
                <div>
                    <button type="submit" class="bg-green-700 text-white px-3 py-2 w-full rounded-md font-medium">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection