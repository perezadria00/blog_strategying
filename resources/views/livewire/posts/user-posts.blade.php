@extends('layouts.app')

@section('title', 'All Posts')

@section('content')
<div class="container mx-auto px-4">

    @if(session()->has('message'))
        <div class="message-container bg-green-500 text-white text-center p-3 mb-4 rounded mx-auto max-w-lg mt-4 transition duration-300">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex justify-center mt-6">
        <button class="bg-blue-500 rounded-lg p-4 mt-4">
            <a href="{{ route('create.post') }}" class="text-white text-center hover:font-bold">Create Post</a>
        </button>
    </div>

    @if($posts->isEmpty())
        <p class="flex justify-center mt-6 text-red-500">No posts available.</p>
    @else
        @foreach($posts as $post)
            <!-- Post container occupying the full width -->
            <div class="w-full bg-white p-8 mb-8 mt-6 shadow-lg rounded-lg border border-gray-300">
                <h3 class="font-bold underline text-center text-2xl">{{ $post->title }}</h3><br>
                <p class="text-justify mt-4">{{ $post->content }}</p><br>
                <h3 class="mt-4">Category:</h3><br>
                <h3>Tags: {{ $post->tag }} </h3>
                <div class="flex justify-between items-center mt-4">
                    <p class="hover:underline hover:font-bold text-left">Created at: {{ $post->created_at->format('d/m/Y') }}</p>

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

