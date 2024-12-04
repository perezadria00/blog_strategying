@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div>
    <h1 class="pt-4 w-1/2 mx-auto text-center font-bold underline">All Posts</h1><br>

    <div>
        @if($posts->isEmpty())
        <p>No posts available.</p>
        @else
        @foreach($posts as $post)
        <div class="w-1/2 mx-auto bg-white p-4 mb-4 shadow-lg rounded-lg border border-gray-300">
            <h3 class="font-bold underline text-center text-lg">{{ $post->title }}</h3><br>
            <p class="text-justify">{{ $post->content }}</p><br>
            <div class="flex justify-between items-center mt-4">
                @if($user)
                    <a href="{{ route('user-posts', $post->user->id) }}">
                        <p class="text-end hover:underline hover:font-bold">By: {{ $post->user->name }}</p>
                    </a>
                @else
                <a href="{{ route('user-posts', $post->user->id) }}">
                    <p class="text-end hover:underline hover:font-bold">By: {{ $post->user->name }}</p>

                    </a>
                @endif
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