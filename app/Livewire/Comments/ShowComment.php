<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class ShowComment extends Component
{

    public $comments;

    public function mount($id){
        $this->comments = Comment::find($id);
    }
    public function render()
    {
        return view('livewire.comments.show-comment', [
            'comments' => $this->comments
        ]);
    }
}
