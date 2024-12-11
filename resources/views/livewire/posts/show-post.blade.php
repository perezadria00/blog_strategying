@extends('layouts.app')

@section('title', 'Post - ' . $post->title)

@section('content')
<div class="flex justify-center py-8 px-4">


    <div class="bg-gray-300 p-6 w-full max-w-full lg:max-w-3xl rounded-md shadow-lg justify-center">
        @if(isset($post) && $post->title)
        <h1 class="font-bold text-2xl text-center text-gray-800 underline decoration-solid pb-5">{{ $post->title }}</h1>
        @else
        <h1 class="font-bold text-2xl text-center text-gray-800 pb-5">Post not found</h1>
        @endif

        <div class="bg-white p-5 rounded-md shadow-sm">
            @if(isset($post) && $post->content)
            <p class="text-justify text-gray-700">{{ $post->content }}</p>
            @else
            <p class="text-justify text-gray-700">No content available for this post.</p>
            @endif

            <br><br>

            <div class="flex justify-between items-start">

                <div class="flex flex-col">
                    <span class="text-l text-gray-600">Posted on: {{ $post->created_at->format('d-m-Y') }}</span>

                  
                    <div class="flex justify-start bg-orange-500 text-white p-2 rounded-lg mt-1 max-w-max">
                        <h3 class="m-0">#{{ $post->category->name }}</h3>
                    </div>
                </div>

                
                <div class="flex items-center justify-between">
                    <div class="max-w-xs">
                        @if($post->user && $post->user->name)
                        <span class="text-l text-gray-600">Author:
                            <a href="{{ route('user-posts', $post->user->id) }}" class="hover:font-bold hover:underline">{{ $post->user->name }}</a>
                        </span>
                        @else
                        <div class="bg-white p-4 rounded-md shadow-sm w-full">
                            <p class="text-red-500 text-center font-semibold">Author not available.</p>
                        </div>
                        @endif
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>


<livewire:comments.create-comment :post_id="$post->id" />


<div class="flex justify-center py-8 px-4">
    <div class="bg-gray-300 p-6 w-full max-w-full lg:max-w-3xl rounded-md shadow-lg justify-center">
        <div>
            @if($comments->isNotEmpty())
            @foreach($comments as $comment)
            <div class="bg-white p-5 rounded-md shadow-sm">
                <p class="pb-4">@ {{ $comment->user->name }}</p>

                <p class="pb-4">{{ $comment->content }}</p>

                <div class="flex items-center justify-between">
                    <p class="text-gray-600">Commented on: {{$comment->created_at->format('d-m-Y')}}</p>
                    <button class="flex items-center bg-gray-500 p-3 text-white hover:bg-gray-600 rounded-md">
                        <i class="fas fa-reply mr-2"></i> Reply
                    </button>
                </div>

            </div>

            @endforeach
            @else
            <div class="bg-white p-4 rounded-md shadow-sm w-full">
                <p class="flex text-red-500 font-bold justify-center">No comments availables for this post.</p>
            </div>
            @endif
        </div>
    </div>

</div>



@endsection