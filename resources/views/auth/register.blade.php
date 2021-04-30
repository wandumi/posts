@extends('frontend.layout.main')

@section('content')
    <div class="flex items-center justify-center h-full mx-auto m-14">
        <div class="p-6 m-5 mt-10 bg-white rounded-md lg:w-2/6 ">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('name') border-red-500 @enderror" 
                    value="{{ old('name') }}">
                    @error('name')
                        <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email address" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('email') border-red-500 @enderror"  
                    value="{{ old('email') }}">
                    @error('email')
                        <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Email</label>
                    <input type="password" name="password" id="password" placeholder="Your Password" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('password') border-red-500 @enderror"  >
                    @error('password')
                        <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password</label>
                    <input type="password" name="password_confirmation" id="password_conf" placeholder="Confirm Password" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('password_confirmation') border-red-500 @enderror"  >
                    @error('password_confirmation')
                        <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="w-full px-3 py-2 font-medium text-white bg-green-700 rounded-md">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection