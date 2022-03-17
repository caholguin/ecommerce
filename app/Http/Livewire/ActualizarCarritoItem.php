<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ActualizarCarritoItem extends Component
{
    public $rowId, $qty, $cantidad;

    public function mount()
    {
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;

        $this->cantidad = qty_available($item->id);
    }

    public function decrement(){
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');        
    }

    public function increment(){
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId, $this->qty);

        $this->emit('render');        
    }
    
    public function render()
    {
        return view('livewire.actualizar-carrito-item');
    }
}
