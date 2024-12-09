<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    public $title, $content, $categoryId, $tagId;  
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

   
    public function resetFields()
    {
        $this->reset(['title', 'content', 'categoryId']);
    }

    // Guardar el post
    public function save()
    {
        $this->validate();  // Validar los datos

        try {
            // Crear el post
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

