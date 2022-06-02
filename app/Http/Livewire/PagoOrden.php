<?php

namespace App\Http\Livewire;

use App\Models\Orden;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class PagoOrden extends Component
{
    use AuthorizesRequests;

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
        $this->authorize('author',$this->orden);

        $this->authorize('payment',$this->orden);


        $items = json_decode($this->orden->contenido);
        $envio = json_decode($this->orden->envio);

        return view('livewire.pago-orden', compact('items','envio'));
    }
}
