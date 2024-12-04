@extends('layouts.app')

@section('title', 'All Posts')
@section('content')
<div>

    @if(session()->has('message'))
    <div class="bg-green-500 text-white text-center p-3 mb-4 rounded mx-auto w-4/5 max-w-lg mt-4">
        {{ session('message') }}
    </div>
    @endif
    @if($posts->isEmpty())
    <p class="flex justify-center mt-6">No posts available.</p>
    @else
    @foreach($posts as $post)
    <div class="w-1/2 mx-auto bg-white p-4 mb-4 mt-6 shadow-lg rounded-lg border border-gray-300">
        
        <h3 class="font-bold underline text-center text-lg">{{ $post->title }}</h3><br>
        <p class="text-justify">{{ $post->content }}</p><br>
        <h3>Category:</h3>
        <div class="flex justify-between items-center mt-4">
            <p class="hover:underline hover:font-bold text-left">Created at: {{ $post->created_at->format('d/m/Y')}}</p>
            @if(auth()->user()->id == $post->user->id)
            <div class="flex gap-2 items-center">
                <livewire:edit-post :postId="$post->id" />
                <livewire:delete-post :postId="$post->id" />
            </div>
            @endif
        </div>
    </div>
    @endforeach
    @endif



</div>

@endsection