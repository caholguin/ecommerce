<?php

namespace App\Http\Livewire;

use App\Models\Talla;
use Livewire\Component;

class AgregarCarritoItemTalla extends Component
{
    public $producto, $tallas;

    public $talla_id = "";
    public $color_id = "";
    public $qty = 1;
    public $cantidad = 0;

    public $colores = [];

    public function updatedTallaId($value)
    {
        $talla = Talla::find($value);
        $this->colores = $talla->colores;
    }

    public function updatedColorId($value)
    {
        $talla = Talla::find($this->talla_id);
        $this->cantidad = $talla->colores->find($value)->pivot->cantidad;

    }

    public function decrement(){
        $this->qty = $this->qty - 1;
    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }


    public function mount()
    {
        $this->tallas = $this->producto->tallas;
    }

    public function render()
    {
        return view('livewire.agregar-carrito-item-talla');
    }
}
