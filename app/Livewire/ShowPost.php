<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class ShowPost extends Component
{
    public Post $post;

    public function render()
    {
        return view('livewire.posts.show-post');
    }

  
    public function mount($id)
    {
     
        $this->post = Post::with('user')->findOrFail($id);
        
        return view('livewire.posts.show-post', ['post' => $this->post]); 
    }

   

    


}

