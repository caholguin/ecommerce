<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

use Livewire\WithPagination;

class UsuarioComponente extends Component
{
    use withPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $usuarios = User::where('name','LIKE', '%' . $this->search . '%')
            ->orwhere('email','LIKE', '%' . $this->search . '%')
            ->paginate();

        return view('livewire.admin.usuario-componente',compact('usuarios'))->layout('layouts.admin');
    }
}
