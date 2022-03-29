<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Producto;

use Livewire\WithPagination;

class MostrarProductos extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public $search;

    public function render()
    {
        $productos = Producto::where('nombre','like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.admin.mostrar-productos',compact('productos'))->layout('layouts.admin');
    }
}
