<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EspecialidadController extends Controller
{
    public function index() {

        return Inertia::render("Especialidades", [
            "especialidades" => Especialidade::join("subcategorias",'subcategorias.id','=','especialidades.id_subcategoria')
        ]);
    }
}
