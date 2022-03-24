<?php

namespace App\Http\Livewire;

use App\Models\Ciudad;
use Livewire\Component;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Orden;

use Gloudemans\Shoppingcart\Facades\Cart;



class CrearOrden extends Component
{
    public $tipo_envio = 1;

    public $direccion,$referencia,$contacto,$telefono,$costo = 0;

    public $departamentos, $ciudades=[], $distritos = [];

    public $departamento_id = "",$ciudad_id = "",$distrito_id = "";

    public $rules = [
        'contacto' => 'required',
        'telefono' => 'required',
        'tipo_envio' => 'required'
    ];

    public function mount()
    {
        $this->departamentos = Departamento::all();
    }

    public function updatedTipoEnvio($value)
    {
        if ($value == 1) {
            $this->resetValidation([
                'departamento_id','ciudad_id','distrito_id','direccion','referencia'
            ]);
        }
    }

    public function updatedDepartamentoId($value)
    {
        $this->ciudades = Ciudad::where('departamento_id',$value)->get();

        $this->reset(['ciudad_id','distrito_id']);
    }

    public function updatedCiudadId($value)
    {
        $ciudad = Ciudad::find($value);

        $this->costo = $ciudad->costo;

        $this->distritos = Distrito::where('ciudad_id',$value)->get();

        $this->reset('distrito_id');
    }



    public function crear_orden()
    {
        $rules = $this->rules;

        if ($this->tipo_envio == 2) {
            $rules['departamento_id'] = 'required';
            $rules['ciudad_id'] = 'required';
            $rules['distrito_id'] = 'required';
            $rules['direccion'] = 'required';
            $rules['referencia'] = 'required';
        }

        $this->validate($rules);

        $orden = new Orden();

        $orden->user_id = auth()->user()->id;
        $orden->contacto = $this->contacto;
        $orden->telefono = $this->telefono;
        $orden->tipo_envio = $this->tipo_envio;
        $orden->costo = 0;
        $orden->total = $this->costo + Cart::subTotal();
        $orden->contenido = Cart::content();


        if ($this->tipo_envio == 2) {
            $orden->costo = $this->costo;
            $orden->departamento_id = $this->departamento_id;
            $orden->ciudad_id = $this->ciudad_id;
            $orden->distrito_id = $this->distrito_id;
            $orden->direccion = $this->direccion;
            $orden->referencia = $this->referencia;
        }

        $orden->save();

        Cart::destroy();
        
        return redirect()->route('ordenes.pago',$orden);
        /*$orden->tipo_envio = $this->tipo_envio;
        $orden->tipo_envio = $this->tipo_envio;
        $orden->tipo_envio = $this->tipo_envio;
        $orden->tipo_envio = $this->tipo_envio;*/



    }

    public function render()
    {
        return view('livewire.crear-orden');
    }
}
