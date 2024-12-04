<?php

namespace App\Livewire\Categories;

use Livewire\Component;
use App\Models\Category;

class CreateCategories extends Component
{

    public $name, $categoryId;

    protected $rules = [

        'name' => 'required|string|max:25'
    ];

    public function mount($categoryId){
        $this->categoryId = $categoryId;
    }

    public function resetFields()
    {
        $this->reset(['name']);
    }
    public function save()
    {

        $this->validate();

        Category::create([
            'name' => $this->name
        ]);

        session()->flash('message', 'Category created successfully!');

    }

    public function render()
    {
        return view('livewire.categories.create-categories');
    }
}
