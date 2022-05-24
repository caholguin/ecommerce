<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Departamento;
use Livewire\WithPagination;



class DepartamentoComponent extends Component
{
    use WithPagination; 

    protected $paginationTheme = "bootstrap";

    public $departamento,$nombre,$editnombre;
    public $search; 

    protected $listeners = ['delete'];

    protected $validationAttributes =[
        'editnombre' => 'nombre'
        
    ];

    public function save()
    {   
        $rules = [
            'nombre' => 'required'
        ];

        $this->validate($rules);

        Departamento::create([
            'nombre' => $this->nombre
        ]);       

        $this->reset();        
    }

    public function edit(Departamento $departamento)
    {     
        $this->resetValidation();
        
        $this->departamento = $departamento;
     
        $this->editnombre = $departamento->nombre;       

        $this->emit('show-modal-departamento','show modal');
    }

    public function update(Departamento $departamento)
    {
        $rules = [
            'editnombre' => 'required'
        ];

        $this->validate($rules);
        
        $this->departamento->update([
            'nombre' => $this->editnombre
        ]);

        $this->reset(['editnombre']);

        $this->emit('departamento-atualizado','hide modal'); 
    }

    public function delete(Departamento $departamento)
    {        
        $departamento->delete();        
    }

    public function render()
    {
        $departamentos = Departamento::where('nombre','like', '%' . $this->search . '%')->latest('id')->paginate(5); 

        return view('livewire.admin.departamento-component',compact('departamentos'))->layout('layouts.admin');
    }
}
