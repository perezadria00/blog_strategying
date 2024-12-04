<?php



namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class EditPost extends Component
{
    public $postId, $title, $content, $userId;

   
    public function mount($postId)
    {
        $this->postId = $postId;
    }

  


    public function render()
    {
        return view('livewire.posts.edit-post');
    }
}
