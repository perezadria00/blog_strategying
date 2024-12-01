@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="flex justify-center py-8">
    <div class="single-post bg-gray-300 p-6 w-full max-w-2xl">
        <h1 class="font-bold text-xl underline decoration-solid pb-5 text-center">{{ $post->title }}</h1>
        <div class="bg-white p-5">
        <p class="text-justify">{{ $post->content }}</p><br><br>
        <p class="text-end hover:underline">By: {{ $post->user->name }}</p>
        <p></p>
        </div>
        <div class="flex justify-end pt-4">
        <button class="bg-gray-500 p-3 text-white hover:bg-gray-600 rounded-md ">Answer</button>
        </div>
        
    </div>

    
</div>



@endsection