<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostComponent extends Component
{
    public $posts, $title, $content, $post_id;
    public $updateMode = false;



    public function render()
    {
        $this->posts = Post::all(); 
        return view('livewire.posts.post-component');
    }

   
    
}

