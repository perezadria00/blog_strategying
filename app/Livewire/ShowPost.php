<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Log;


class ShowPost extends Component
{
    public Post $post;
    public $comments;

    public function mount($id)
    {
       
        $this->post = Post::with('user')->findOrFail($id);
        
        $this->comments = $this->post->comments;

       
    }

    public function render()
    {
        
        return view('livewire.posts.show-post',[
            'post' => $this->post,
            'comments' => $this->comments
        ]);
    }
}

