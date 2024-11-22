<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class Posts extends Component
{
    public $posts, $title, $content, $post_id;
    public $isOpen = 0;

    // Get all posts from DB
    public function render()
    {
        $this->posts = Post::all();
        return view('livewire.posts');
    }

    // Reset
    public function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
    }

    public function openModal(){
        $this->isOpen = true;
    }

    public function closeModal(){
        $this->isOpen = false;
    }

    // Create new post
    public function store()
    {

        $validatedDate = $this->validate([

            'title' => 'required',
            'content' => 'required',

        ]);

        Post::create($validatedDate);
        session()->flash('message', 'Post created successfully!');

        $this->resetInputFields();
        $this->closeModal();
    }

    public function show($id)
    {
        
        $post = Post::find($id);

       
        if (!$post) {
            abort(404);  
        }

        
        return view('livewire.show', compact('post'));
    }

    // Edit a post

    public function edit($id)
    {

        $post = Post::find($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->openModal();
    }


    // Update a post

    public function update()
    {
        $validatedDate = $this->validate([

            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::find($this->post_id);
        $post->update($validatedDate);
        session()->flash('message', 'Post updated successfully!');
        $this->resetInputFields();
        $this->closeModal();
    }

    // Delete a post
    public function delete($id){
        $post = Post::find($id)->delete();
        session()->flash('message', 'Post deleted successfully!');
    }
}
