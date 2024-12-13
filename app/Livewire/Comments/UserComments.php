<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\User;

class UserComments extends Component
{

    public Comment $comment;

   public $user_id, $user;

    public function render()
    {
        return view('livewire.comments.user-comments');
    }
}
