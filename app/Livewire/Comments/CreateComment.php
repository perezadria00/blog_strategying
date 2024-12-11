<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CreateComment extends Component
{
    public $content, $post_id;

    protected $listeners = ["resetNewComment"=> "resetCommentContent"];

    protected $rules = [
        'content' => 'required|string|max:300',
    ];


    public function resetComment()
    {
        $this->reset('content');
    }

   
    public function save()
    {
        $this->validate(); 

        Comment::create([
            'user_id' => Auth::id(),
            'content' => $this->content,
            'post_id' => $this->post_id
        ]);

    }

  public function resetCommentContent(){
    $this->content = '';
  }

    public function render()
    {
        return view('livewire.comments.create-comment');
    }
}

