<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DropdownCarrito extends Component
{
    protected $listeners = ['render'];
    
    public function render()
    {
        return view('livewire.dropdown-carrito');
    }
}
