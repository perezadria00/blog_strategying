<?php



namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class EditPost extends Component
{

    public $title, $content, $category, $tag, $postId, $user_id;

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'category' => 'required',
        // 'tags' => 'nullable'
    ];

    public $updateMode = false;

    public function mount($postId)
    {
        $post = Post::findOrFail($postId);

        if ($post) {
            $this->postId = $post->id;
            $this->title = $post->title;
            $this->content = $post->content;
            $this->category = $post->category_id;
            $this->tag = $post->tag_id;
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

            'content' => $this->content,

            'category_id' => $this->category,

            'tags' => $this->tag


        ]);

        $this->updateMode = false;

        session()->flash('message', 'Post updated successfully.');

        // $this->resetInputFields();
        return redirect()->route('user-posts', ['userId' => auth()->user()->id]);
    }



    public function render()
    {
        return view('livewire.posts.edit-post')->extends('layouts.app');
    }
}
