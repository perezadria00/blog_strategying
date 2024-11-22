@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<div class="flex justify-center py-8">
    <div class="single-post bg-gray-300 p-6 w-full max-w-2xl">
        <h1 class="font-bold text-xl underline decoration-solid pb-5 text-center">{{ $post->title }}</h1>
        <div class="bg-white p-5">
        <p>{{ $post->content }}</p>
        </div>
        
    </div>
</div>
@endsection
