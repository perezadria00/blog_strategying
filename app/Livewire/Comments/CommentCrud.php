<?php

namespace App\Livewire\Comments;

use Livewire\Component;
use App\Models\Comment;

class CommentCrud extends Component
{

    public $content;

    protected $rules = [

        'content' => 'required|string|max:255'
    ];

    public function resetFields()
    {
        $this->reset(['title', 'content']);
    }

    public function cancel(){

        session()->flash('message', 'Are you sure?');

    }
    
    public function render()
    {
        return view('livewire.comments.comment-crud');
    }
}
