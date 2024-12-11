<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    public $title, $content, $categoryId, $tagId, $newCategoryName;
    public $categories = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'categoryId' => 'required|exists:categories,id',  
    ];

    public $messages = [
        'title.required' => 'Title cannot be empty',
        'content.required' => 'Content cannot be empty',
        'categoryId.required' => 'You must select a category.',
    ];

  
    protected $listeners = ['categoryAdded' => 'addCategory'];

    public function addCategory($category)
    {
       
        $newCategory = Category::create(['name' => $category]);

        
        $this->categories = Category::all();

        
        $this->categoryId = $newCategory->id;
    }

    public function resetFields()
    {
        $this->reset(['title', 'content', 'categoryId']);

        $this->dispatch('resetNewCategory');
    }

  
    public function save()
    {
        $this->validate();  

        try {
            
            if ($this->newCategoryName) {
                $category = Category::create(['name' => $this->newCategoryName]);
                $this->categoryId = $category->id; 
            }

            
            Post::create([
                'user_id' => Auth::id(),
                'title' => $this->title,
                'content' => $this->content,
                'category_id' => $this->categoryId, 
                'tag_id' => 54,  
            ]);

            session()->flash('message', 'Post created successfully!');
            $this->resetFields(); 
            return $this->redirect(route('user-posts', ['userId' => Auth::id()]));
        } catch (\Exception $e) {
            session()->flash('message', 'Error creating post');
        }
    }

   
    public function mount()
    {
        $this->categories = Category::all();  
    }

    public function render()
    {
        return view('livewire.posts.create-post', [
            'categories' => $this->categories,  
        ]);
    }
}


