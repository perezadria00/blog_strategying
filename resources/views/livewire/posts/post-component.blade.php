@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div class="container mx-auto px-4">

    <h1 class="pt-4 text-center font-bold underline text-2xl mb-6">All Posts</h1>

    <div>
        @if($posts->isEmpty())
        <p class="text-center text-red-500 mt-6">No posts available.</p>
        @else
        @foreach($posts as $post)
        <div class="w-full bg-white p-8 mb-8 shadow-lg rounded-lg border border-gray-300">
            <h3 class="font-bold underline text-center text-xl">{{ $post->title }}</h3><br>
            <p class="text-justify mt-4">{{ $post->content }}</p><br>

            <div class="flex justify-between items-center mt-4">
                <a href="{{ route('user-posts', $post->user->id) }}">
                    <p class="text-end hover:underline hover:font-bold">By: {{ $post->user->name }}</p>
                </a>
                <a href="{{ route('posts.show', $post->id) }}">
                    <button class="bg-gray-500 p-3 text-white hover:bg-gray-600 rounded-md">
                        View more
                    </button>
                </a>
            </div>
        </div>
        @endforeach
        @endif

        
    </div>
</div>

@endsection