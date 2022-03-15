<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AgregarCarritoItemColor extends Component
{
    public $producto, $colores;
    public $color_id="";

    public $qty = 1;
    public $cantidad = 0;

    public function mount(){
        $this->colores = $this->producto->colores;
    }

    public function decrement(){
        $this->qty = $this->qty - 1;
    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function render()
    {
        return view('livewire.agregar-carrito-item-color');
    }

    public function updatedColorId($value)
    {
        $this->cantidad = $this->producto->colores->find($value)->pivot->cantidad;
    }
}
