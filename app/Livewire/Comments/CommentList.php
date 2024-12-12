<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class CommentList extends Component
{

    public $comments = [];
    public $commentableId;
    public $commentableType;

    protected $listeners = ['commentAdded' => 'loadComments'];

    public function mount($commentableId, $commentableType) {
        $this->commentableId = $commentableId;
        $this->commentableType = $commentableType;
        $this->loadComments();
    }

 
    public function render()
    {
        return view('livewire.comments.comment-list');
    }
}
