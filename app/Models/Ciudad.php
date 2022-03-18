<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudades';

    protected $fillable = ['nombre','costo','departamento_id'];


    //uno muchos
    public function distritos()
    {
        return $this->hasMany(Distrito::class);
    }

    
    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }
}
