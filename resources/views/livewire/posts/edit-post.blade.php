<div class="w-1/2 mx-auto bg-white p-4 mb-4 mt-6 shadow-lg rounded-lg border border-gray-300">
    <h3 class="font-bold underline text-center text-lg">Edit Post</h3>


    
        <div class="mt-4">
            <label for="title" class="block text-l font-bold text-black-700 underline">Title</label>
            <input type="text" id="title" wire:model="title" value="{{$title}}"class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 l:text-l">
        </div>

      
        <div class="mt-4">
            <label for="content" class="block text-l font-bold text-black-700 underline">Content</label>
            <textarea id="content" wire:model="content" value="{{$content}}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 l:text-l" rows="5">{{$content}}</textarea>
        </div>

        <button type="button" wire:click="save" class="mt-4 bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300 transition duration-300">
            Update
        </button>

</div>
