<?php

namespace App\Http\Livewire\Admin;

use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;


class MarcaComponent extends Component
{
    use WithPagination; 

    protected $paginationTheme = "bootstrap";

   /*  public function updatingSearch(){
        $this->resetPage();
    }  */
    protected $listeners = ['delete'];
    public $search; 

    public $marca,$nombre,$editnombre;
    
 
    protected $validationAttributes =[
        'editnombre' => 'nombre'
        
    ];
    
    /* public function obtenerMarcas()
    {
        $this->marcas = Marca::all();
    } */

    public function save()
    {   
        $rules = [
            'nombre' => 'required'
        ];
        $this->validate($rules);

        Marca::create([
            'nombre' => $this->nombre
        ]);       

        $this->reset();
        
    }

    public function edit(Marca $marca)
    {     
        $this->resetValidation();
        
        $this->marca = $marca;
     
        $this->editnombre = $marca->nombre;       

        $this->emit('show-modal-marca','show modal');
    }

    public function update(Marca $marca)
    {
        $rules = [
            'editnombre' => 'required'
        ];

        $this->validate($rules);
        
        $this->marca->update([
            'nombre' => $this->editnombre
        ]);

        $this->reset(['editnombre']);

        $this->emit('marca-atualizada','hide modal'); 
    }

    public function delete(Marca $marca)
    {
        $marca->delete();        
    }

    public function render()
    {
        $marcas = Marca::where('nombre','like', '%' . $this->search . '%')->latest('id')->paginate(5);        

        return view('livewire.admin.marca-component',compact('marcas'))->layout('layouts.admin');
    }
}
