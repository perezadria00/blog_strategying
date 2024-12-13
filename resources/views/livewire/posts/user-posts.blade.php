@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div class="container mx-auto px-4">

    @if(session()->has('message'))
    <div class="message-container bg-green-500 text-white text-center p-3 mb-4 rounded mx-auto max-w-lg mt-4 transition duration-300">
        {{ session('message') }}
    </div>
    @endif


    @auth
    @if(auth()->user()->id == $posts[0]->user->id)

    <h1 class="flex justify-center pt-8 text-2xl underline">Your posts</h1>

    <div class="flex justify-end mt-4 bg-white rounded-lg p-4 pt-1 shadow-lg border border-gray-300">
        <button class="bg-blue-500 rounded-lg p-4 mt-4">
            <a href="{{ route('create.post') }}" class="text-white text-center hover:font-bold">Create Post</a>
        </button>
    </div>
    @else
    <h1 class="flex justify-center pt-8 text-2xl underline">{{ $posts[0]->user->name }}'s posts</h1>
    @endif
    @endauth

    @guest
    <h1 class="flex justify-center pt-8 text-2xl underline">Posts</h1>
    @endguest

    @if($posts->isEmpty())
    <p class="flex justify-center mt-6 text-red-500">No posts available.</p>
    @else
    @foreach($posts as $post)

    <div class="w-full bg-white p-8 mb-8 mt-6 shadow-lg rounded-lg border border-gray-300">
        <div class="grid grid-cols-2">

            <div class="flex justify-between">
                <h3 class="font-bold underline text-center text-2xl">{{ $post->title }}</h3>
            </div>

            <!--  Añadir div para categorias -->

        </div>

        <p class="text-justify mt-4">{{ $post->content }}</p><br>

        <div class="flex justify-between items-center mt-4">
            <p class="hover:underline hover:font-bold text-left">Posted on: {{ $post->created_at->format('d/m/Y') }}</p>

            @if($post->user && auth()->check() && auth()->user()->id == $post->user->id)
            <div class="flex items-center gap-2 mt-4">
                <div class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300">
                    <a href="{{ route('edit-post', ['postId' => $post->id]) }}" class="text-white text-center hover:underline hover:font-bold">Edit</a>
                </div>
                <livewire:delete-post :postId="$post->id" />
            </div>
            @endif
        </div>
    </div>
    @endforeach
    @endif



</div>
@endsection