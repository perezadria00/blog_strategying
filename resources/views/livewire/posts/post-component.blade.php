@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div class="container mx-auto px-4">

    <h1 class="pt-4 text-center font-bold underline text-2xl mb-6">All Posts</h1>
    <div>
        <div class="flex items-center justify-between w-full p-4">

            <input wire:model.debounce.500ms="search" type="text" placeholder="Search a post..." class="border p-2 rounded w-full max-w-md">

            <div class="flex items-center space-x-2 ml-auto">

                <select wire:model="sortOrderDesc" class="rounded ml-4">
                    <option value="">Order by</option>
                    <option value="asc">Oldest</option>
                    <option value="desc">Newest</option>
                </select>
            </div>
        </div>

        @if($posts->isEmpty())
        <p class="text-center text-red-500 mt-6">No posts found.</p>
        @else
        @foreach($posts as $post)
        <div class="w-full bg-white p-8 mb-8 shadow-lg rounded-lg border border-gray-300">
            <div class="flex justify-between items-center w-full">
                <h3 class="font-bold underline text-xl">{{ $post->title }}</h3>
                <!-- Añadir div para categorias -->
            </div>

            <p class="text-justify mt-4">{{ $post->content }}</p><br>

            <div class="flex justify-between items-center mt-4">
                <div>
                    <a href="{{ route('user-posts', $post->user->id) }}">
                        <p class="text-left hover:underline hover:font-bold">Author: {{ $post->user->name }}</p>
                    </a>
                    <br>
                    <p>Posted on: {{$post->created_at->format('d/m/Y')}}</p>
                </div>
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