<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = 'distritos';

    protected $fillable = ['nombre','ciudad_id'];

    //uno a muchos
    public function ordenes()
    {
        return $this->hasMany(Orden::class);
    }
}
