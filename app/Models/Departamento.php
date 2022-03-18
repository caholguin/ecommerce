<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'departamentos';

    protected $fillable = ['nombre'];

    //uno a muchos
    public function ciudades()
    {
        return $this->hasMany(Ciudad::class);
    }

    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }
}
