<?php



namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class EditPost extends Component
{

    public $title, $content, $postId, $user_id;

    public $categories = [];

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string'
    ];

    public $updateMode = false;

    public function mount($postId)
    {
        $post = Post::findOrFail($postId);

        if ($post) {
            $this->postId = $post->id;
            $this->title = $post->title;
            $this->content = $post->content;
        } else {
            session()->flash('error', 'Post not found!');
        }
    }



    public function save()

    {

        $this->validate();

        $post = Post::find($this->postId);


        $post->update([

            'title' => $this->title,

            'content' => $this->content

        ]);

        $this->updateMode = false;

        session()->flash('message', 'Post updated successfully.');


        return redirect()->route('user-posts', ['userId' => auth()->user()->id]);
    }




    public function render()
    {
        return view('livewire.posts.edit-post')->extends('layouts.app');
    }
}
