<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;


class AgregarCarritoItemColor extends Component
{
    public $producto, $colores;
    public $color_id="";

    public $qty = 1;
    public $cantidad = 0;

    public $options = [
        'talla_id' => null
    ];

    public function mount()
    {
        $this->colores = $this->producto->colores;
        $this->options['imagen'] = Storage::url($this->producto->imagenes->first()->url);
    }
    
    public function updatedColorId($value)
    {
        $color = $this->producto->colores->find($value);
         //$this->cantidad = $color->pivot->cantidad;
        $this->cantidad = qty_available($this->producto->id,$color->id); 
        $this->options['color'] = $color->nombre;
        $this->options['color_id'] = $color->id;
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

        $this->cantidad = qty_available($this->producto->id,$this->color_id);

        $this->reset('qty');

        $this->emitTo('dropdown-carrito','render');
        $this->emitTo('navegacion','render');
    }   
    

    public function render()
    {
        return view('livewire.agregar-carrito-item-color');
    }

}
