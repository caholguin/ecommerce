<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colores';

    protected $fillable = ['nombre'];

    //muchos a muchos
    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }

    public function tallas()
    {
        return $this->belongsToMany(Talla::class);
    }
}
;