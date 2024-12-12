<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CreateComment extends Component
{
    public $content, $post_id, $commentableId, $commentableType, $parentId;


    protected $rules = [
        'content' => 'required|string|max:300',
    ];


    public function mount($commentableId, $commentableType, $parentId = null)
    {
        $this->commentableType = $commentableType;
        $this->parentId = $parentId;
        $this->commentableId = $commentableId;
    }

    public function resetComment()
    {
        $this->reset('content');
    }


    public function save()
    {
        $this->validate();

        $commentable = $this->getCommentableModel();

        Comment::create([
            'user_id' => Auth::id(),
            'content' => $this->content,
            'parent_id' => $this->parentId,
            'commentable_id' => $this->commentableId,
            'commentable_type' => get_class($commentable)
        ]);

        $this->reset('content');

        $this->dispatch('comments.comment-list', 'commentAdded');
    }

    public function getCommentableModel()
    {
        if ($this->commentableType === 'post') {
            return Post::findOrFail($this->commentableId);
        }
    }

    public function render()
    {
        return view('livewire.comments.create-comment');
    }
}
