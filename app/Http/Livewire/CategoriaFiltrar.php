<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Builder;

class CategoriaFiltrar extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $categoria, $subcategoria, $marca;

    public function limpiar()
    {
        $this->reset(['subcategoria','marca']);
    }


    public function render()
    {
        // $productos = $this->categoria->productos; 

        // Esto trae solo los productos por categorias 
        /*$productos = $this->categoria->productos()
        ->paginate(20); */
        
        //esto hace lo mismo pero trae la consulta mas compleja
        /*$productos = Producto::wherehas('subcategoria.categoria', function(Builder $query){
            $query->where('id', $this->categoria->id);
        })->paginate(20);*/

        //Esto crea una consulta y no una coleccion
        $productosQuery = Producto::query()->wherehas('subcategoria.categoria',function(Builder $query){
            $query->where('id', $this->categoria->id);
        });

        if ($this->subcategoria) {
            $productosQuery = $productosQuery->wherehas('subcategoria',function(Builder $query){
                $query->where('nombre', $this->subcategoria);
            });
        }

        if ($this->marca) {
            $productosQuery = $productosQuery->wherehas('marca',function(Builder $query){
                $query->where('nombre', $this->marca);
            });
        }


        $productos = $productosQuery ->paginate(20);

        return view('livewire.categoria-filtrar',compact('productos'));
    }
}
