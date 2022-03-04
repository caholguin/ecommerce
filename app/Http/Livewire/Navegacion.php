<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class Navegacion extends Component
{
    public function render()
    {
        $categorias = Categoria::all();

        return view('livewire.navegacion',compact('categorias'));
    }
}
