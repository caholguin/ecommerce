<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;
use App\Models\ColorTalla as Pivot;

class ColorTalla extends Component
{
    public $talla,$colores,$color_id,$cantidad;

    public $pivot,$pivot_color_id, $pivot_cantidad;

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
        ->where('talla_id',$this->talla->id)
        ->first();

        //Si existe actualiza la cantidad 
        if ($pivot) {
            $pivot->cantidad = $pivot->cantidad + $this->cantidad;
            $pivot->save();
        } else {
            //Si no existe crea el registro
            $this->talla->colores()->attach([
                $this->color_id => [
                    'cantidad' => $this->cantidad
                ]
            ]);
        }

        $this->reset(['color_id','cantidad']);

        $this->emit('saved');

        $this->talla = $this->talla->fresh();
    }

    public function edit(Pivot $pivot)
    {
        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_cantidad = $pivot->cantidad;

        $this->emit('show-modal-cantidadColorTalla','show modal');  
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
        $this->talla = $this->talla->fresh();

        $this->emit('cantidadColorTalla-atualizado','hide modal'); 
    }


    public function render()
    {
        $tallaColores = $this->talla->colores;

        return view('livewire.admin.color-talla',compact('tallaColores'));
    }
}
