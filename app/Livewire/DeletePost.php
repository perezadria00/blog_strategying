<?php



namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class DeletePost extends Component
{
    public $postId;

   
    public function mount($postId)
    {
        $this->postId = $postId;
    }

  
    public function delete()
    {
        $post = Post::find($this->postId);

        
        if ($post && $post->user_id == Auth::id()) {
            $post->delete();
            session()->flash('message', 'Post deleted successfully!');
        } else {
            session()->flash('message', 'Post not found or you do not have permission to delete this post.');
        }

        
        $this->redirect('user-posts'); 
    }

    public function render()
    {
        return view('livewire.posts.delete-post');
    }
}

