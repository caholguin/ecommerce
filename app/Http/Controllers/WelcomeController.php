<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $categorias = Categoria::all();

        return view('welcome',compact('categorias'));
    }
}
