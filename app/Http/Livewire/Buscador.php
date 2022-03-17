<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Buscador extends Component
{
    public $buscar;
    
    public function render()
    {
        $productos = Producto::where('nombre','LIKE', "%" . $this->buscar . "%")->get();

        return view('livewire.buscador',compact('productos'));
    }
}
