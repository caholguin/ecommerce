<?php

namespace App\Http\Livewire;

use App\Models\Orden;
use Livewire\Component;


class PagoOrden extends Component
{
    public $orden;

    protected $listeners = ['pagoOrden'];

    public function mount(Orden $orden)
    {
        $this->orden = $orden;
    }

    public function pagoOrden()
    {
        //aca mande el valor de 3 porque resta en uno el valor que se le envia 
        $this->orden->estado = 3;
        $this->orden->save();

       
        return redirect()->route('ordenes.show', $this->orden);
    }

    public function render()
    {
        $items = json_decode($this->orden->contenido);

        return view('livewire.pago-orden', compact('items'));
    }
}
