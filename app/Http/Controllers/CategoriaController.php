<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoriaController extends Controller
{
    public function index() {

        return Inertia::render("Categorias", [
            "categorias" => Categoria::all()
        ]);
    }

}
