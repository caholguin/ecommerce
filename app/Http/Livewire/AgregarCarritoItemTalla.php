<?php

namespace App\Http\Livewire;

use App\Models\Talla;
use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;


class AgregarCarritoItemTalla extends Component
{
    public $producto, $tallas;

    public $talla_id = "";
    public $color_id = "";
    public $qty = 1;
    public $cantidad = 0;
    public $colores = [];
    public $options = [];

    public function mount()
    {
        $this->tallas = $this->producto->tallas;
        $this->options['imagen'] = Storage::url($this->producto->imagenes->first()->url);

    }

    public function updatedTallaId($value)
    {
        $talla = Talla::find($value);
        $this->colores = $talla->colores;
        $this->options['talla'] = $talla->nombre;
    }

    public function updatedColorId($value)
    {
        $talla = Talla::find($this->talla_id);
        $color = $talla->colores->find($value);
        // $this->cantidad = $color->pivot->cantidad;
        $this->cantidad = qty_available($this->producto->id,$color->id,$talla->id);
        $this->options['color'] = $color->nombre;
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

        $this->cantidad = qty_available($this->producto->id,$this->color_id,$this->talla_id);

        $this->reset('qty');
        
        $this->emitTo('dropdown-carrito','render');
        $this->emitTo('navegacion','render');
    }


    public function render()
    {
        return view('livewire.agregar-carrito-item-talla');
    }
}
