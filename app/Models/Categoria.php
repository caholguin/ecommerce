<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','slug','imagen','icono'];

    //uno a muchos
    public function subcategorias()
    {
        return $this->hasMany(SubCategoria::class);
    }

    //muchos a muchos 
    public function marcas()
    {
        return $this->belongsToMany(Marca::class);
    }

    public function productos()
    {
        return $this->hasManyThrough(Producto::class,SubCategoria::class);
    }
}
