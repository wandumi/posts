@extends('frontend.layout.main')

@section('content')
    <div class="flex justify-center ">
        <div class="p-6 m-5 bg-white rounded-sm sm:w-2/6">
        
                <div class="flex mb-10">
                    Create A certificate
                </div>
          
                @if (session('success'))
                    <div class="p-3 mb-6 text-center text-white bg-green-500 rounded-md">
                        {{ session('success' )}}
                    </div>
                @endif
                <form action="{{ route('design') }}" method="post" class="mb-6">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="sr-only">Name</label>
                        <input type="text" name="name" id="name" placeholder="Post name" 
                        class="bg-gray-100 border-2 w-full p-3 rounded-md @error('name') border-red-500 @enderror" 
                        value="{{ old('name') }}">
                        @error('name')
                            <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="title" class="sr-only">Second</label>
                        <input type="text" name="title" id="second" placeholder="Post second" 
                        class="bg-gray-100 border-2 w-full p-3 rounded-md @error('second') border-red-500 @enderror" 
                        value="{{ old('second') }}">
                        @error('second')
                            <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="title" class="sr-only">Third</label>
                        <input type="text" name="third" id="third" placeholder="Post third" 
                        class="bg-gray-100 border-2 w-full p-3 rounded-md @error('third') border-red-500 @enderror" 
                        value="{{ old('third') }}">
                        @error('third')
                            <div class="mt-2 text-sm text-red-600"> {{ $message }}</div>
                        @enderror
                    </div>
                    
                   
                    <div class="mb-4">
                        <button class="w-full px-3 py-2 font-medium text-white bg-green-600 rounded">Post</button>
                    </div>
                </form>
                
        </div>
    </div>
@endsection
@section('footer')
    <style>
        #socil-links {
            display: inline-block !important;
        }
    </style>
@endsection