<div class="min-h-screen flex items-center justify-center bg-white-100 mt-8 mb-8">
    <div class="flex flex-col justify-center items-center p-5 bg-white shadow-lg rounded-lg w-full max-w-md">
        <h1 class="text-2xl font-bold mb-6 text-gray-500">New Post</h1>

        <div class="mb-4 w-full">
            <label for="title" class="block text-lg font-medium text-gray-700 underline">Title</label>
            <input type="text" wire:model="title" id="title" name="title" class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Enter post title">
            @error('title')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4 w-full">
            <label for="content" class="block text-lg font-medium text-gray-700 underline">Content</label>
            <textarea wire:model="content" id="content" name="content" class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Enter post content"></textarea>
            @error('content')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4 w-full">
            <label for="content" class="block text-lg font-medium text-gray-700 underline">Tags</label>

            <select name="tags" id="tags" class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500">
                <option value="tag1">Tag 1</option>
                <option value="tag2">Tag 2</option>
                <option value="tag3">Tag 3</option>
            </select>

            <button class="mt-2 bg-gray-500 text-white px-6 py-2 w-full rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300">
                Create new tag
            </button>
        </div>

        <div class="mb-4 w-full">
            <label for="categories" class="block text-lg font-medium text-gray-700 underline">Categories</label>

            <select name="categories[]" id="categories" multiple class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500">
                <option value="category1">Category 1</option>
                <option value="category2">Category 2</option>
                <option value="category3">Category 3</option>
                <option value="category4">Category 4</option>
            </select>

            <button class="mt-2 bg-gray-500 text-white px-6 py-2 w-full rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300">
                Create new category
            </button>
        </div>

        <div class="mt-6 flex space-x-4">

            <button wire:click="resetFields" class="bg-gray-500 text-white px-6 py-3 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300">
                Reset
            </button>

            <button wire:click="save" class="bg-green-500 text-white px-6 py-3 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300 transition duration-300">
                Create Post
            </button>

        </div>

    </div>
</div>