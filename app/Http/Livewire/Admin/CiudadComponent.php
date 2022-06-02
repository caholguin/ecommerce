<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Ciudad;
use App\Models\Departamento;
use Livewire\WithPagination;


class CiudadComponent extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public $ciudad,$nombre, $departamento_id="",$costo,$editnombre,$editdepartamento_id,$editcosto;
      
    protected $listeners = ['delete'];

    protected $validationAttributes =[
        'editnombre' => 'nombre',
        'editdepartamento_id' => 'departamento_id',
        'editcosto' => 'costo'
    ];

    public function save()
    {   
        $rules = [
            'nombre' => 'required',
            'costo' => 'required',
            'departamento_id' => 'required'
        ];

        $this->validate($rules);

        Ciudad::create([
            'nombre' => $this->nombre,
            'costo' => $this->costo,
            'departamento_id' => $this->departamento_id
        ]);       

        $this->reset();        
    }

    public function edit(Ciudad $ciudad)
    {     
        $this->resetValidation();
        
        $this->ciudad = $ciudad;
        $this->editnombre = $ciudad->nombre;
        $this->editcosto = $ciudad->costo;
        $this->editdepartamento_id = $ciudad->departamento_id;
        
        $this->emit('show-modal-ciudad','show modal');
    }

    public function update(Ciudad $ciudad)
    {
        $rules = [
            'editnombre' => 'required',
            'editcosto' => 'required',
            'editdepartamento_id' => 'required'
        ];

        $this->validate($rules);

        $this->ciudad->update([
            'nombre' => $this->editnombre,
            'costo' => $this->editcosto,
            'departamento_id' => $this->editdepartamento_id
        ]);

        $this->reset(['editnombre','editcosto','editdepartamento_id']);

        $this->emit('ciudad-atualizada','hide modal'); 
    }

    public function delete(Ciudad $ciudad)
    {        
        $ciudad->delete();        
    }
    


    public function render()
    {
        $ciudades = Ciudad::where('nombre','like', '%' . $this->search . '%')->latest('id')->paginate(5); 

        $departamentos = Departamento::all();

        return view('livewire.admin.ciudad-component',compact('ciudades','departamentos'))->layout('layouts.admin');
    }
}
