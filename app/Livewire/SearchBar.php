<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

class SearchBar extends Component
{

    public $search = " ";

    public function updatedSearch($value)
    {
      
        $this->dispatch('searchUpdated', $value);
    }
    
    public function render()
    {
        
        return view('livewire.search-bar');
    }
}
