<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Color;
use App\Models\Talla;

class ActualizarCarritoItemTalla extends Component
{
    public $rowId, $qty, $cantidad;

    public function mount()
    {
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;

        $color = Color::where('nombre', $item->options->color)->first();
        $talla = Talla::where('nombre', $item->options->talla)->first();


        $this->cantidad = qty_available($item->id,$color->id,$talla->id);
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

        return view('livewire.actualizar-carrito-item-talla');
    }
}
