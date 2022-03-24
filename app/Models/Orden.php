<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;

    protected $table = 'ordenes';

    protected $guarded = ['id','created_at','updated_at','estado'];

    const PENDIENTE = 1;
    const RECIBIDO = 2;
    const ENVIADO = 3;
    const ENTREGADO = 4;
    const ANULADO = 5;

    //uno a muchos inversa
    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
