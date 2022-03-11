<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoriaProductos extends Component
{
    public $categoria;  
    
    public $productos = [];

    public function loadProductos()
    {
        $this->productos = $this->categoria->productos;
        //$this->products = $this->category->products()->where('status', 2)->take(15)->get();

        $this->emit('glider',$this->categoria->id);
    }

    public function render()
    {
        return view('livewire.categoria-productos');
    }
}
