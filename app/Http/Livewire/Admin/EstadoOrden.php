<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EstadoOrden extends Component
{
    public $orden,$estado;

    public function mount()
    {
        $this->estado = $this->orden->estado;
    }

    public function update()
    {
        $this->orden->estado = $this->estado;
        $this->orden->save();
    }

    public function render()
    {
        $items = json_decode($this->orden->contenido);

        return view('livewire.admin.estado-orden',compact('items'));
    }
}
