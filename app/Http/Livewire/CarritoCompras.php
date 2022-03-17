<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class CarritoCompras extends Component
{
    protected $listeners = ['render'];

    public function destroy(){
        Cart::destroy();

        $this->emitTo('dropdown-carrito','render');
        $this->emitTo('navegacion','render');
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);

        $this->emitTo('dropdown-carrito','render');
        $this->emitTo('navegacion','render');
    }
    
    public function render()
    {
        return view('livewire.carrito-compras');
    }
}
