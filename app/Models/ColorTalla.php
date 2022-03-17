<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorTalla extends Model
{
    use HasFactory;

    protected $table = "color_talla";

    //uno a muchos inversa
    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function talla()
    {
        return $this->belongsTo(Talla::class);
    }
}
