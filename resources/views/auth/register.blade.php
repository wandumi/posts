@extends('frontend.layout.main')

@section('content')
    <div class="flex justify-center items-center m-14">
        <div class="w-4/12 bg-white m-5 p-6 rounded-md mt-10 ">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your Name" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('name') border-red-500 @enderror" 
                    value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-600 mt-2 text-sm"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your Email address" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('email') border-red-500 @enderror"  
                    value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-600 mt-2 text-sm"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Email</label>
                    <input type="password" name="password" id="password" placeholder="Your Password" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('password') border-red-500 @enderror"  >
                    @error('password')
                        <div class="text-red-600 mt-2 text-sm"> {{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Password</label>
                    <input type="password" name="password_confirmation" id="password_conf" placeholder="Confirm Password" 
                    class="bg-gray-100 border-2 w-full p-3 rounded-md @error('password_confirmation') border-red-500 @enderror"  >
                    @error('password_confirmation')
                        <div class="text-red-600 mt-2 text-sm"> {{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-green-700 text-white px-3 py-2 w-full rounded-md font-medium">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection