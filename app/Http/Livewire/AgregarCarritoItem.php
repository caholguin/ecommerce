<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AgregarCarritoItem extends Component
{
    public $producto,$cantidad;    
    public $qty = 1;
    public $options = [];

    public function mount()
    {
        $this->cantidad = $this->producto->cantidad;
        $this->options['imagen'] = Storage::url($this->producto->imagenes->first()->url);
    }

    public function decrement(){
        $this->qty = $this->qty - 1;
    }

    public function increment(){
        $this->qty = $this->qty + 1;
    }

    public function agregarItem()
    {
        Cart::add(['id' => $this->producto->id,
                    'name' => $this->producto->nombre,
                    'qty' => $this->qty,
                    'price' => $this->producto->precio,
                    'weight' => 550, 
                    'options' => $this->options                   
        ]);
    }

    public function render()
    {
        return view('livewire.agregar-carrito-item');
    }
}
