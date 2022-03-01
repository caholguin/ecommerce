<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    const BORRADOR = 0;
    const PUBLICADO = 1;

    protected $guarded  = ['id','created_at','update_at'];

    //uno a muchos
    public function tallas()
    {
        return $this->hasMany(Talla::class);
    }

    //uno a muchos inversa
    public function Marca()
    {
        return $this->belongsTo(Marca::class);
    }
  
    public function subcategoria()
    {
        return $this->belongsTo(subcategoria::class);
    }

    //muchos a muchos 
    public function colores()
    {
        return $this->belongsToMany(Color::class);
    }    

    //uno a muchos polimorfica 
    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imageable');
    }
}
