<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use App\Models\SubCategoria;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

use Illuminate\Support\Str;

class CrearProducto extends Component
{
    public $categorias, $subcategorias=[], $marcas=[];

    public $categoria_id="",$subcategoria_id="",$marca_id="";

    public $nombre, $slug, $descripcion, $precio, $cantidad;

    protected $rules = [
        'categoria_id' => 'required',
        'subcategoria_id' => 'required',
        'nombre' => 'required',
        'slug' => 'required|unique:productos',
        'descripcion' => 'required',
        'marca_id' => 'required',
        'precio' => 'required',
    ];

    public function updatedCategoriaId($value)
    {
        $this->subcategorias = SubCategoria::where('categoria_id', $value)->get();

        $this->marcas = Marca::whereHas('categorias', function(Builder $query) use ($value){
            $query->where('categoria_id', $value);
        })->get();

        $this->reset(['subcategoria_id','marca_id']);
    }

    public function updatedNombre($value)
    {
        $this->slug = Str::slug($value);
    }

    public function getSubcategoriaProperty()
    {
        return SubCategoria::find($this->subcategoria_id);
    }

    public function mount()
    {
        $this->categorias = Categoria::all();
    }

    public function save()
    {
        $rules = $this->rules;

        if ($this->subcategoria_id) {
            if (!$this->subcategoria->color && !$this->subcategoria->talla) {
                $rules['cantidad'] = 'required';
            }
        }

        $this->validate($rules);

        $producto = new Producto();

        $producto->nombre = $this->nombre;
        $producto->slug = $this->slug;
        $producto->descripcion = $this->descripcion;
        $producto->precio = $this->precio;
        $producto->subcategoria_id = $this->subcategoria_id;
        $producto->marca_id = $this->marca_id;

        if ($this->subcategoria_id) {
            if (!$this->subcategoria->color && !$this->subcategoria->talla) {
                $producto->cantidad = $this->cantidad;
            }
        }

        $producto->save();

        return redirect()->route('admin.productos.edit',$producto);
    }

    public function render()
    {
        return view('livewire.admin.crear-producto')->layout('layouts.admin');
    }
}
