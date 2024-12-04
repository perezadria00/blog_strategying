<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;

class UserPosts extends Component
{
    public $posts, $userId, $category;
   

    public function mount($userId) {
        $this->userId = $userId;
        $this->posts = Post::where('user_id', $this->userId)->get();
        
    }

 

    public function render() {
        return view('livewire.posts.user-posts', ['posts' => $this->posts]);
    }
}



