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