<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use App\Models\Marca;
use Livewire\Component;
use App\Models\Producto;
use App\Models\SubCategoria;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Str;

class EditarProducto extends Component
{
    public $producto, $categorias, $subcategorias, $marcas,$slug;

    public $categoria_id;

    protected $rules = [
        'categoria_id' => 'required',
        'producto.subcategoria_id' => 'required',
        'producto.nombre' => 'required',
        'slug' => 'required|unique:productos,slug',
        'producto.descripcion' => 'required',
        'producto.marca_id' => 'required',
        'producto.precio' => 'required',
        'producto.cantidad' => 'numeric',
    ];

    public function mount(Producto $producto)
    {           
        $this->producto = $producto;

        $this->categorias = Categoria::all();

        $this->categoria_id = $producto->subcategoria->categoria->id;

        $this->subcategorias = SubCategoria::where('categoria_id', $this->categoria_id)->get();

        $this->slug = $this->producto->slug;

        $this->marcas = Marca::whereHas('categorias', function(Builder $query) {
            $query->where('categoria_id', $this->categoria_id);
        })->get();
    }

    public function updatedProductoNombre($value)
    {
        $this->slug = Str::slug($value);
    }

    public function updatedCategoriaId($value)
    {
        $this->subcategorias = SubCategoria::where('categoria_id', $value)->get();

        $this->marcas = Marca::whereHas('categorias', function(Builder $query) use ($value){
            $query->where('categoria_id', $value);
        })->get();

        // $this->reset(['subcategoria_id','marca_id']);
        $this->producto->subcategoria_id = "";
        $this->producto->marca_id = "";
    }

    public function getSubcategoriaProperty()
    {
        return SubCategoria::find($this->producto->subcategoria_id);
    }

    public function save()
    {
        $rules = $this->rules;
        $rules['slug'] = 'required|unique:productos,slug,'. $this->producto->id;

        if ($this->producto->subcategoria_id) {
            if (!$this->subcategoria->color && !$this->subcategoria->talla) {
                $rules['producto.cantidad'] = 'required|numeric';
            }
        }

        $this->validate($rules);

        $this->producto->slug = $this->slug;

        $this->producto->save();

        $this->emit('saved');
    }

    public function render()
    {
        return view('livewire.admin.editar-producto')->layout('layouts.admin');;
    }
}
