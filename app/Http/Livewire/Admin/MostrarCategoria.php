<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use App\Models\SubCategoria;
use Livewire\Component;
use Illuminate\Support\Str;


class MostrarCategoria extends Component
{
    public $categoria,$subcategorias,$subcategoria;

    protected $listeners = ['delete'];

    public $createForm = [
        'nombre' => null,
        'slug' => null,
        'color' => false,
        'talla' => false,
    ];

    public $editForm = [
        'nombre' => null,
        'slug' => null,
        'color' => false,
        'talla' => false,
    ];

    protected $rules = [
        'createForm.nombre' => 'required',
        'createForm.slug' => 'required|unique:subcategorias,slug',
        'createForm.color' => 'required',
        'createForm.talla' => 'required'
    ];

    protected $validationAttributes = [
        'createForm.nombre' => 'nombre',
        'createForm.slug' => 'slug',
        
    ];

    public function mount(Categoria $categoria)
    {
        $this->categoria = $categoria;
        $this->mostrarSubcategorias();
    }

    public function updatedcreateFormNombre($value)
    {
        $this->createForm['slug'] = Str::slug($value);
    }

    public function updatededitFormNombre($value)
    {
        $this->editForm['slug'] = Str::slug($value);
    }

    public function mostrarSubcategorias()
    {
        $this->subcategorias = SubCategoria::where('categoria_id', $this->categoria->id)->get();
    }

    public function save()
    {
        $this->validate();

        $this->categoria->subcategorias()->create($this->createForm);

        $this->reset('createForm');
        $this->mostrarSubcategorias();
    }

    public function edit(SubCategoria $subcategoria)
    {
        $this->resetValidation();
        $this->subcategoria = $subcategoria;

        $this->editForm['nombre'] = $subcategoria->nombre;
        $this->editForm['slug'] = $subcategoria->slug;
        $this->editForm['color'] = $subcategoria->color;
        $this->editForm['talla'] = $subcategoria->talla;

        $this->emit('show-modal-subcategoria','show modal');
    }

    public function update()
    {
        $this->validate([           
            'editForm.nombre' => 'required',
            'editForm.slug' => 'required|unique:subcategorias,slug,' . $this->subcategoria->id,
            'editForm.color' => 'required',
            'editForm.talla' => 'required'
        ]);

        $this->subcategoria->update($this->editForm);

        $this->mostrarSubcategorias();
        $this->reset('editForm');

        $this->emit('subcategoria-atualizada','hide modal'); 
    }

    public function delete(SubCategoria $subcategoria)
    {
        $subcategoria->delete();
        $this->mostrarSubcategorias();

    }

    public function render()
    {
        return view('livewire.admin.mostrar-categoria')->layout('layouts.admin');
    }
}
