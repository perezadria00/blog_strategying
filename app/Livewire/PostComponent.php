<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use Livewire\WithPagination;

class PostComponent extends Component
{
    public $user;

    use WithPagination;

    public function mount($userId = null)
    {
        $this->user = $userId ? User::findOrFail($userId) : null;
    }

    public function render()
    {
        // Usar paginación condicional
        $posts = $this->user 
                    ? Post::where('user_id', $this->user->id)->paginate(10)
                    : Post::paginate(5); // Pagina todos los posts si no se proporciona un usuario
        
        return view('livewire.posts.post-component', [
            'posts' => $posts,
        ]);
    }
}

