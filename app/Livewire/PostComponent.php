<?php



namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;

class PostComponent extends Component
{
    public $user;

    public $search = " ";

    protected $listeners = ['searchUpdated' => 'updateSearch'];

    public function updateSearch($searchTerm)
    {
        $this->search = $searchTerm;
    }
   

    public function mount($userId = null)
    {
        $this->user = $userId ? User::findOrFail($userId) : null;
    }

    public function render()
    {
        
        $query = Post::query();

        if ($this->user) {
            $query->where('user_id', $this->user->id);
        }

        $posts = Post::where('title', 'like', '%' . $this->search . '%')->get();
        $posts = $query->get();
        
        return view('livewire.posts.post-component', [
            'posts' => $posts,
            'search' => $this->search
        ]);
    }
}



