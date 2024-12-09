<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;

class ShowComment extends Component


{

    public Comment $comment;

    public function mount($id){
        $this->comment = Comment::with('user')->findOrFail($id);
    }
    public function render()
    {
        return view('livewire.show-comment');
    }
}
