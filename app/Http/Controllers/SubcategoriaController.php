<?php

namespace App\Http\Controllers;

use App\Models\Subcategoria;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubcategoriaController extends Controller
{
    public function index() {

        return Inertia::render("Subcategorias", [
            "subcategorias" => Subcategoria::join("categorias",'categorias.id','=','subcategorias.id_categoria')
        ]);
    }
}
