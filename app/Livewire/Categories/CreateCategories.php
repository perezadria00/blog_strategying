<?php
namespace App\Livewire\Categories;

use Livewire\Component;

class CreateCategories extends Component
{
    public $newCategory;

    protected $listeners = ["resetNewCategory"=> "resetCategoryField"];

    public function addCategory()
    {
     
        $this->dispatch('categoryAdded', $this->newCategory);

        
        $this->newCategory = '';
    }

    public function resetCategoryField(){
        $this->newCategory = '';
    }

    public function render()
    {
        return view('livewire.categories.create-categories');
    }
}
