<?php

namespace App\Http\Livewire\Admin;

use App\Models\Talla;
use Livewire\Component;

class TallaProducto extends Component
{
    public $producto,$nombre;

    public $talla,$nombre_edit;

    protected $listeners = ['delete'];

    protected $rules = [
        'nombre' => 'required'
    ];

    public function save()
    {
        $this->validate();

        //Comprobamos si existe la talla
        $talla = Talla::where('producto_id', $this->producto->id)
        ->where('nombre',$this->nombre)
        ->first();

        //si existe emitimos un evento
        if ($talla) {
            $this->emit('errorTalla', 'Esta talla ya existe');
        } else {
            //Si no existe creamos el registro
            $this->producto->tallas()->create([
                'nombre' => $this->nombre
            ]);
        }

        $this->reset('nombre');

        $this->producto = $this->producto->fresh(); 
    }

    public function edit(Talla $talla)
    {
        $this->nombre_edit = $talla->nombre;
        $this->talla = $talla;

        $this->emit('show-modal-tallap','show modal');       
    }

    public function update()
    {
        $this->validate([
            'nombre_edit' => 'required'
        ]);

        $this->talla->nombre = $this->nombre_edit;
        $this->talla->save();

        $this->producto = $this->producto->fresh();

        $this->emit('tallap-atualizado','hide modal');
    }

      public function delete(Talla $talla)
      {
        $talla->delete();
        $this->producto = $this->producto->fresh();
      }

    public function render()
    {
        $tallas = $this->producto->tallas;
        return view('livewire.admin.talla-producto',compact('tallas'));
    }
}
