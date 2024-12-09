<div class="mb-4 w-full">
    <label for="newCategory" class="block text-lg font-medium text-gray-700 underline">New Category</label>
    <input type="text" wire:model="newCategory" id="newCategory" class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500" placeholder="Add a new category">
    <button wire:click="addCategory" class="mt-2 bg-gray-500 text-white px-6 py-2 w-full rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition duration-300">
        Add Category
    </button>
</div>
