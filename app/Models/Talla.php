<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','producto_id'];

    //uno a muchos inversa
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    //muchos a muchos
    public function colores()
    {
        return $this->belongsToMany(Color::class)->withPivot('cantidad');
    }


}
