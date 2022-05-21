<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EstadoOrden extends Component
{
    public $orden;

    public function render()
    {
        $items = json_decode($this->orden->contenido);

        return view('livewire.admin.estado-orden',compact('items'));
    }
}
