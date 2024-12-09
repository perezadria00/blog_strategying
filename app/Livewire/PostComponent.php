<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use Livewire\WithPagination;



class PostComponent extends Component
{
    public $user;
    public $perPage = 5;  // Default items per page

    use WithPagination;

    public function mount($userId = null, $perPage = null)
    {
        $this->user = $userId ? User::findOrFail($userId) : null;
        
        if ($perPage) {
            $this->perPage = $perPage;
        }
    }

    public function render()
    {
        $posts = $this->user 
                    ? Post::where('user_id', $this->user->id)->paginate($this->perPage)
                    : Post::paginate($this->perPage);

        return view('livewire.posts.post-component', [
            'posts' => $posts,
        ]);
    }
}


