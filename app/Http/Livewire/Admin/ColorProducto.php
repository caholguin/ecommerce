<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Color;
use App\Models\ColorProducto as Pivot;

class ColorProducto extends Component
{
    public $producto,$colores,$color_id,$cantidad,$open = false;

    public $pivot, $pivot_color_id, $pivot_cantidad;

    protected $listeners = ['delete'];

    protected $rules = [
        'color_id' => 'required',
        'cantidad' => 'required|numeric'
    ];

    public function mount()
    {
        $this->colores = Color::all();
    }

    public function save()
    {
        $this->validate();

        // Aca comprobamos si el color y la candidad exite 
        $pivot = Pivot::where('color_id', $this->color_id)
        ->where('producto_id',$this->producto->id)
        ->first();

        //Si existe actualiza la cantidad  
        if ($pivot) {
            $pivot->cantidad = $pivot->cantidad + $this->cantidad;
            $pivot->save();
            
        } else {
            //Si no existe crea el registro
            $this->producto->colores()->attach([
                $this->color_id => [
                    'cantidad' => $this->cantidad
                ]
            ]);
        }

        $this->reset(['color_id','cantidad']);

        $this->emit('saved');

        $this->producto = $this->producto->fresh();
    }

    public function edit(Pivot $pivot)
    {
        // dd($pivot);
        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_cantidad = $pivot->cantidad;

        $this->emit('show-modal-colorp','show modal');       
    }

    public function update()
    {
        $this->validate([
            'pivot_color_id' => 'required',
            'pivot_cantidad' => 'required',
        ]);

        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->cantidad = $this->pivot_cantidad;
        $this->pivot->save();

        $this->producto = $this->producto->fresh();
        $this->emit('color-atualizado','hide modal');       
    }

    public function delete(Pivot $pivot)
    {
        $pivot->delete();
        $this->producto = $this->producto->fresh();
    }

    public function render()
    {
        $productoColores = $this->producto->colores;

        return view('livewire.admin.color-producto',compact('productoColores'));
    }
}
