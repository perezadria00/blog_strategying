<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostComponent extends Component
{
    public $search = '';
    public $sortOrderDesc = 'desc'; 

    protected $listeners = ['searchUpdated' => 'updateSearch'];

    public function updateSearch($searchTerm)
    {
        $this->search = $searchTerm;
    }

    public function render()
    {
   
        $query = Post::query();

     
        if ($this->search) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

  
        $posts = $query->orderBy('created_at', $this->sortOrderDesc)->get();

        return view('livewire.posts.post-component', [
            'posts' => $posts,
            'search' => $this->search
        ]);
    }
}




