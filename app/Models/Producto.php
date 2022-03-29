<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    const BORRADOR = 0;
    const PUBLICADO = 1;

    protected $table = 'productos';


    protected $guarded  = ['id','created_at','update_at'];

    //protected $fillable  = ['id','nombre','slug','descripcion','precio','subcategoria_id','marca_id','cantidad','estado','created_at','update_at'];

    public function getStockAttribute()
    {
        if ($this->subcategoria->talla) {
            return ColorTalla::whereHas('talla.producto', function(Builder $query){
                $query->where('id', $this->id);
            })->sum('cantidad');
        }elseif($this->subcategoria->color) {
            return ColorProducto::whereHas('producto', function(Builder $query){
                $query->where('id', $this->id);
            })->sum('cantidad');
        }else{
            return $this->cantidad;
        }
        
    }

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
        return $this->belongsToMany(Color::class)->withPivot('cantidad', 'id');
    }    

    //uno a muchos polimorfica 
    public function imagenes()
    {
        return $this->morphMany(Imagen::class, 'imageable');
    }

    //url amigable
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
