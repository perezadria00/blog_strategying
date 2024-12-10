<?php

namespace App\Livewire;

use Livewire\Component;
use app\Models\Comment;
use Illuminate\Support\Facades\Auth;
class CreateComment extends Component
{

    public $content, $post_id;


    protected $rules = [
        'content'=> 'required|string|max:300',
    ];

    
    public function save(){
        $this->validate();

        Comment::create([
            'user_id' => Auth::id(),
            'content'=> $this->content,
            'post_id' => $this->post_id
        ]);
    }

    public function render()
    {
        return view('livewire.comments.create-comment');
    }

}
