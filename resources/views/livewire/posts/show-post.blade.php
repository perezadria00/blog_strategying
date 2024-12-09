@extends('layouts.app')

@section('title', 'Post - ' . $post->title)

@section('content')
<div class="flex justify-center py-8 px-4">


    <div class="bg-gray-300 p-6 w-full max-w-full lg:max-w-3xl rounded-md shadow-lg">

        <h1 class="font-bold text-2xl text-center text-gray-800 underline decoration-solid pb-5">{{ $post->title }}</h1>
    
        <div class="bg-white p-5 rounded-md shadow-sm">
            <p class="text-justify text-gray-700">{{ $post->content }}</p><br><br>
            
            <p class="text-end text-l text-gray-600 hover:underline">
                By: <a href="{{ route('user-posts', $post->user->id) }}" class="hover:font-bold">{{ $post->user->name }}</a>
            </p>
        </div>

        <div class="flex pt-4">
            <div class="ml-auto">
                <button class="bg-gray-500 p-3 text-white hover:bg-gray-600 rounded-md">
                    Reply
                </button>
            </div>
        </div>

        

        

    </div>

    
    
</div>
@endsection

