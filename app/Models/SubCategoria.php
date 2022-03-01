<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;

    protected $table = 'subcategorias';

    protected $guarded  = ['id','created_at','update_at'];

    //uno a muchos 
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    //uno a muchos inversa
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    
}
