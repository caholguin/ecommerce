<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use App\Models\Marca;
use Livewire\Component;

use Illuminate\Support\Str;

use Livewire\WithFileUploads;

class CrearCategoria extends Component
{
    use WithFileUploads;
    
    public $marcas,$rand,$categorias;

    public $createForm = [
        'nombre' => null,
        'slug' => null,
        'icono' => null,
        'imagen' => null,
        'marcas' => [],
    ];

    protected $rules = [
        'createForm.nombre' => 'required',
        'createForm.slug' => 'required|unique:categorias,slug',
        'createForm.icono' => 'required',
        'createForm.imagen' => 'required|image|max:1024',
        'createForm.marcas' => 'required',
    ];

    protected $validationAttributes = [
        'createForm.nombre' => 'nombre',
        'createForm.slug' => 'slug',
        'createForm.icono' => 'icono',
        'createForm.imagen' => 'imagen',
        'createForm.marcas' => 'marcas',
    ];

    public function mount()
    {
        $this->obtenerMarcas();
        $this->mostrarCategorias();

        $this->rand = rand();
    }

    public function updatedcreateFormNombre($value)
    {
        $this->createForm['slug'] = Str::slug($value);
    }

    public function obtenerMarcas()
    {
        $this->marcas = Marca::all();
    }

    public function mostrarCategorias()
    {
        $this->categorias = Categoria::all();
    }

    public function save()
    {
        $this->validate();
        
        $imagen = $this->createForm['imagen']->store('categorias');

        $categoria =  Categoria::create([
            'nombre' => $this->createForm['nombre'],
            'slug' => $this->createForm['slug'],
            'icono' => $this->createForm['icono'],
            'imagen' => $imagen,

        ]);

        $categoria->marcas()->attach($this->createForm['marcas']);

        $this->rand = rand();
        $this->reset('createForm');

        $this->mostrarCategorias();
    }


    public function render()
    {
        return view('livewire.admin.crear-categoria');
    }
}
