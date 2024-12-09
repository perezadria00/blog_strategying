<?php

namespace App\Livewire\Categories;


use Livewire\Component;


class CreateCategories extends Component
{

    public $newCategory;

    public function addCategory()
    {
       
        $this->dispatch('categoryAdded', ['category' => $this->newCategory]);
        

        $this->newCategory = '';
    }

    public function render()
    {
        return view('livewire.categories.create-categories');
    }
}
