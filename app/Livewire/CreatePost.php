<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    public $title, $content, $userId;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ];

    public $messages = [
        'title.required' => 'Title cannot be empty',
        'content.required' => 'Content cannot be empty'
    ];

    
    public function resetFields()
    {
        $this->reset(['title', 'content']);
    }

    public function save()
    {

        try {
            $this->validate();  

            
            Post::create([
                'user_id' => Auth::id(),
                'title' => $this->title,
                'content' => $this->content,
                'tag_id' => 54,
                'category_id' => 14
            ]);

        } catch (\Exception $e) {
            session()->flash('message', 'Error creating post');
        }

        
        session()->flash('message', 'Post created successfully!');

        
        $this->resetFields();

        
        return redirect()->route('user-posts', ['userId' => Auth::id()]);
    }

    public function render()
    {
        return view('livewire.posts.create-post');
    }
}

