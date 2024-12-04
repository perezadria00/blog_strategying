<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;

class PostComponent extends Component
{
    public $posts, $user;

    public function mount($userId = null)
    {
        if ($userId) {
            $this->user = User::findOrFail($userId);  
            $this->posts = Post::where('user_id', $this->user->id)->get();  
        } else {
            
            $this->user = null;
            $this->posts = Post::all();  
        }
    }

    public function render()
    {
        return view('livewire.posts.post-component');
    }
}

